<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\PageVisit;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $leadsTotal = Lead::query()->count();
        $leadsToday = Lead::query()->whereDate('created_at', today())->count();
        $leadsWeek = Lead::query()->where('created_at', '>=', now()->startOfWeek())->count();
        $visitsToday = PageVisit::query()->whereDate('visited_on', today())->count();
        $visitsTotal = PageVisit::query()->count();

        $conversionRate = $visitsTotal > 0
            ? round(($leadsTotal / $visitsTotal) * 100, 1)
            : 0.0;

        $recentLeads = Lead::query()
            ->latest()
            ->limit(8)
            ->get();

        return view('dashboard', [
            'user' => auth()->user(),
            'stats' => [
                'leads_total' => $leadsTotal,
                'leads_today' => $leadsToday,
                'leads_week' => $leadsWeek,
                'visits_today' => $visitsToday,
                'conversion_rate' => $conversionRate,
            ],
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
