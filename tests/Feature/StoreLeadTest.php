<?php

namespace Tests\Feature;

use App\Models\Addon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreLeadTest extends TestCase
{
    use RefreshDatabase;

    public function test_lead_can_be_created_with_addon_service(): void
    {
        Addon::query()->create([
            'title' => 'متجر إلكتروني',
            'description' => 'وصف المتجر',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->postJson('/leads', [
            'interest' => 'متجر إلكتروني',
            'name' => 'أحمد',
            'phone' => '0501234567',
            'note' => 'أحتاج متجر',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('leads', [
            'interest' => 'متجر إلكتروني',
            'name' => 'أحمد',
            'phone' => '0501234567',
        ]);
    }

    public function test_lead_rejects_unknown_interest(): void
    {
        $this->postJson('/leads', [
            'interest' => 'خدمة غير موجودة',
            'name' => 'أحمد',
            'phone' => '0501234567',
        ])->assertStatus(422);
    }

    public function test_package_booking_lead_can_be_created(): void
    {
        $response = $this->postJson('/leads', [
            'interest' => 'باقة النمو',
            'name' => 'سارة',
            'phone' => '0551234567',
            'note' => 'متجر ملابس',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('leads', [
            'interest' => 'باقة النمو',
            'name' => 'سارة',
            'note' => 'متجر ملابس',
        ]);
    }

    public function test_home_lists_active_addons_in_interest_select(): void
    {
        Addon::query()->create([
            'title' => 'شات بوت',
            'description' => 'وصف',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('name="interest"', false)
            ->assertSee('<option value="شات بوت">شات بوت</option>', false);
    }
}
