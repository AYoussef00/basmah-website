<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardPackageLeadsTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_package_leads_in_separate_table(): void
    {
        $user = User::factory()->create();

        Lead::query()->create([
            'interest' => 'باقة النمو',
            'name' => 'عميل باقة',
            'phone' => '0551111111',
            'note' => 'مطعم',
            'status' => 'new',
        ]);

        Lead::query()->create([
            'interest' => 'شات بوت',
            'name' => 'عميل استشارة',
            'phone' => '0552222222',
            'note' => null,
            'status' => 'new',
        ]);

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertOk()
            ->assertSee('طلبات الباقات')
            ->assertSee('عميل باقة')
            ->assertSee('باقة النمو')
            ->assertSee('آخر طلبات الاستشارة')
            ->assertSee('عميل استشارة')
            ->assertSee('التفاصيل المالية');
    }
}
