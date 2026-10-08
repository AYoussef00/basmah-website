<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'Google Ads Creative Certification',
                'issuer' => 'Google Skillshop',
                'image_path' => 'brand/certs/google-ads-creative-badge.png',
                'url' => 'https://www.credential.net/9821d055-6855-43d3-a090-b6d184e5d692',
                'sort_order' => 1,
            ],
            [
                'title' => 'Google Ads Measurement Certification',
                'issuer' => 'Google Skillshop',
                'image_path' => 'brand/certs/google-ads-measurement-badge.png',
                'url' => 'https://www.credential.net/345118fd-bddd-4f2d-a301-cc60e8569d0d',
                'sort_order' => 2,
            ],
            [
                'title' => 'Google Analytics Certification (2026)',
                'issuer' => 'Google Skillshop',
                'image_path' => 'brand/certs/google-analytics-badge.png',
                'url' => 'https://www.credential.net/f72e40c7-d5d7-41e4-8197-b3da2524afa0',
                'sort_order' => 3,
            ],
            [
                'title' => 'Google Partner',
                'issuer' => 'Google',
                'image_path' => 'brand/certs/google-partner-badge.jpg',
                'url' => 'https://www.google.com/partners',
                'sort_order' => 4,
            ],
        ];

        foreach ($certificates as $certificate) {
            Certificate::query()->updateOrCreate(
                ['title' => $certificate['title']],
                [
                    ...$certificate,
                    'is_active' => true,
                ],
            );
        }
    }
}
