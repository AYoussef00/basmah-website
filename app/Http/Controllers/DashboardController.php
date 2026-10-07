<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lead;
use App\Models\PageVisit;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $leadsTotal = Lead::query()->count();
        $leadsToday = Lead::query()->whereDate('created_at', today())->count();
        $leadsWeek = Lead::query()->where('created_at', '>=', now()->startOfWeek())->count();
        $packageLeadsWeek = Lead::query()->packages()->where('created_at', '>=', now()->startOfWeek())->count();
        $visitsToday = PageVisit::query()->whereDate('visited_on', today())->count();
        $visitsTotal = PageVisit::query()->count();

        $conversionRate = $visitsTotal > 0
            ? round(($leadsTotal / $visitsTotal) * 100, 1)
            : 0.0;

        $activeClients = Client::query()->active()->latest('started_at')->get();
        $monthlyRevenue = (int) Client::query()->active()->sum('monthly_amount');
        $revenueByPackage = Client::query()
            ->active()
            ->select('package', DB::raw('COUNT(*) as clients_count'), DB::raw('SUM(monthly_amount) as revenue'))
            ->groupBy('package')
            ->orderByDesc('revenue')
            ->get();

        $packageLeads = Lead::query()
            ->packages()
            ->whereIn('status', ['new', 'rejected'])
            ->latest()
            ->limit(20)
            ->get();

        $recentLeads = Lead::query()
            ->consultations()
            ->latest()
            ->limit(8)
            ->get();

        return view('dashboard', [
            'user' => auth()->user(),
            'stats' => [
                'leads_total' => $leadsTotal,
                'leads_today' => $leadsToday,
                'leads_week' => $leadsWeek,
                'package_leads_week' => $packageLeadsWeek,
                'visits_today' => $visitsToday,
                'conversion_rate' => $conversionRate,
                'active_clients' => $activeClients->count(),
                'monthly_revenue' => $monthlyRevenue,
            ],
            'packageLeads' => $packageLeads,
            'clients' => $activeClients,
            'revenueByPackage' => $revenueByPackage,
            'recentLeads' => $recentLeads,
            'interestLabels' => [
                'commerce' => 'متاجر الكترونية',
                'website' => 'انشاء موقع الكتروني',
                'ads' => 'اعلانات مدفوعة',
                'social' => 'ادارة المنصات',
                'seo' => 'ظهور في نتائج البحث جوجل ( SEO )',
            ],
        ]);
    }
}
