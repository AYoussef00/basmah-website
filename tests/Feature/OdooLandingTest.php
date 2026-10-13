<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OdooLandingTest extends TestCase
{
    use RefreshDatabase;

    public function test_odoo_landing_page_is_accessible_and_seo_ready(): void
    {
        $this->get('/odoo')
            ->assertOk()
            ->assertSee('تطبيق Odoo في السعودية', false)
            ->assertSee('موديولات Odoo', false)
            ->assertSee('application/ld+json', false)
            ->assertSee('rel="canonical"', false)
            ->assertSee('المحاسبة والمالية', false)
            ->assertSee('احجز جلسة تشخيص مجانية', false)
            ->assertSee('brand/odoo-logo.png', false)
            ->assertSee('معاينة لوحة تحكم Odoo', false);
    }

    public function test_odoo_lead_can_be_submitted(): void
    {
        $this->postJson('/leads', [
            'interest' => 'استشارة Odoo',
            'name' => 'خالد',
            'phone' => '0501234567',
            'note' => 'شركة توزيع',
        ])
            ->assertCreated()
            ->assertJsonPath('message', 'تم استلام طلبك بنجاح.');

        $this->assertDatabaseHas('leads', [
            'interest' => 'استشارة Odoo',
            'name' => 'خالد',
            'phone' => '0501234567',
        ]);
    }
}
