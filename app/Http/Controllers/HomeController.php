<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Certificate;
use App\Models\PageVisit;
use App\Models\SiteSetting;
use Database\Seeders\CertificateSeeder;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Throwable;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $this->trackVisit();

        return view('home', [
            'siteSettings' => SiteSetting::current(),
            'addons' => Addon::query()->active()->ordered()->get(),
            'certificates' => $this->certificates(),
        ]);
    }

    /**
     * @return Collection<int, Certificate>
     */
    private function certificates(): Collection
    {
        try {
            if (! Schema::hasTable('certificates')) {
                return $this->fallbackCertificates();
            }

            $certificates = Certificate::query()->active()->ordered()->get();

            if ($certificates->isEmpty()) {
                (new CertificateSeeder)->run();
                $certificates = Certificate::query()->active()->ordered()->get();
            }

            return $certificates->isNotEmpty()
                ? $certificates
                : $this->fallbackCertificates();
        } catch (Throwable) {
            return $this->fallbackCertificates();
        }
    }

    /**
     * @return Collection<int, Certificate>
     */
    private function fallbackCertificates(): Collection
    {
        $defaults = [
            [
                'title' => 'Google Ads Creative Certification',
                'issuer' => 'Google Skillshop',
                'image_path' => 'brand/certs/google-ads-creative-badge.png',
                'url' => 'https://www.credential.net/9821d055-6855-43d3-a090-b6d184e5d692',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Google Ads Measurement Certification',
                'issuer' => 'Google Skillshop',
                'image_path' => 'brand/certs/google-ads-measurement-badge.png',
                'url' => 'https://www.credential.net/345118fd-bddd-4f2d-a301-cc60e8569d0d',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Google Analytics Certification (2026)',
                'issuer' => 'Google Skillshop',
                'image_path' => 'brand/certs/google-analytics-badge.png',
                'url' => 'https://www.credential.net/f72e40c7-d5d7-41e4-8197-b3da2524afa0',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Google Partner',
                'issuer' => 'Google',
                'image_path' => 'brand/certs/google-partner-badge.jpg',
                'url' => 'https://www.google.com/partners',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        return collect($defaults)
            ->filter(fn (array $certificate): bool => is_file(public_path($certificate['image_path'])))
            ->map(fn (array $certificate): Certificate => Certificate::make($certificate))
            ->values();
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
