<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Certificate;
use App\Models\PageVisit;
use App\Models\SiteSetting;
use Illuminate\Database\QueryException;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $this->trackVisit();

        return view('home', [
            'siteSettings' => SiteSetting::current(),
            'addons' => Addon::query()->active()->ordered()->get(),
            'certificates' => Certificate::query()->active()->ordered()->get(),
        ]);
    }

    private function trackVisit(): void
    {
        try {
            PageVisit::query()->firstOrCreate(
                [
                    'session_id' => session()->getId(),
                    'path' => '/',
                    'visited_on' => now()->toDateString(),
                ],
                [
                    'ip_address' => request()->ip(),
                ],
            );
        } catch (QueryException) {
            // Ignore duplicate race conditions on unique index.
        }
    }
}
