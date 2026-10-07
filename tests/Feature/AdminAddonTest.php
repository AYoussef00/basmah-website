<?php

namespace Tests\Feature;

use App\Models\Addon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAddonTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_manage_addons(): void
    {
        $this->get('/dashboard/addons')->assertRedirect('/login');
    }

    public function test_admin_can_create_addon(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/dashboard/addons', [
            'title' => 'صفحة هبوط',
            'description' => 'صفحة واحدة مصممة لإطلاق منتج',
            'sort_order' => 1,
            'is_active' => 1,
        ]);

        $response->assertRedirect('/dashboard/addons');
        $this->assertDatabaseHas('addons', [
            'title' => 'صفحة هبوط',
            'description' => 'صفحة واحدة مصممة لإطلاق منتج',
            'is_active' => 1,
        ]);
    }

    public function test_home_shows_active_addons_only(): void
    {
        Addon::query()->create([
            'title' => 'خدمة ظاهرة',
            'description' => 'وصف ظاهر',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Addon::query()->create([
            'title' => 'خدمة مخفية',
            'description' => 'وصف مخفي',
            'sort_order' => 2,
            'is_active' => false,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('خدمة ظاهرة')
            ->assertDontSee('خدمة مخفية');
    }
}
