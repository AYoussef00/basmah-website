<?php

namespace Tests\Feature;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class AdminCertificateTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_certificate(): void
    {
        $user = User::factory()->create();
        $image = UploadedFile::fake()->image('badge.png', 200, 200);

        $this->actingAs($user)
            ->post('/dashboard/certificates', [
                'title' => 'Google Ads Creative Certification',
                'issuer' => 'Google Skillshop',
                'url' => 'https://www.credential.net/9821d055-6855-43d3-a090-b6d184e5d692',
                'image' => $image,
                'sort_order' => 1,
                'is_active' => 1,
            ])
            ->assertRedirect('/dashboard/certificates');

        $certificate = Certificate::query()->first();
        $this->assertNotNull($certificate);
        $this->assertSame('Google Ads Creative Certification', $certificate->title);
        $this->assertTrue(File::exists(public_path($certificate->image_path)));

        File::delete(public_path($certificate->image_path));
    }

    public function test_home_shows_active_certificates_section(): void
    {
        Certificate::query()->create([
            'title' => 'Google Ads Creative Certification',
            'issuer' => 'Google Skillshop',
            'image_path' => 'brand/certs/google-ads-creative-badge.png',
            'url' => 'https://www.credential.net/9821d055-6855-43d3-a090-b6d184e5d692',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('id="certs"', false)
            ->assertSee('Google Ads Creative Certification')
            ->assertSee('Google Skillshop');
    }
}
