<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PackageLeadReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_approve_package_lead_and_create_client(): void
    {
        $user = User::factory()->create();
        $lead = Lead::query()->create([
            'interest' => 'باقة النمو',
            'name' => 'نورة',
            'phone' => '0559999999',
            'note' => 'عيادة تجميل',
            'status' => 'new',
        ]);

        $this->actingAs($user)
            ->post("/dashboard/package-leads/{$lead->id}/approve")
            ->assertRedirect('/dashboard');

        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'status' => 'approved',
        ]);

        $this->assertDatabaseHas('clients', [
            'lead_id' => $lead->id,
            'name' => 'نورة',
            'package' => 'باقة النمو',
            'monthly_amount' => 3900,
            'status' => 'active',
        ]);

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertOk()
            ->assertSee('العملاء الحاليون')
            ->assertSee('نورة')
            ->assertSee('3,900');
    }

    public function test_reject_requires_note(): void
    {
        $user = User::factory()->create();
        $lead = Lead::query()->create([
            'interest' => 'باقة الحضور',
            'name' => 'فهد',
            'phone' => '0558888888',
            'note' => 'متجر',
            'status' => 'new',
        ]);

        $this->actingAs($user)
            ->from('/dashboard')
            ->post("/dashboard/package-leads/{$lead->id}/reject", [])
            ->assertRedirect('/dashboard')
            ->assertSessionHasErrors('rejection_note');

        $this->actingAs($user)
            ->post("/dashboard/package-leads/{$lead->id}/reject", [
                'rejection_note' => 'البيانات غير مكتملة',
            ])
            ->assertRedirect('/dashboard');

        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'status' => 'rejected',
            'rejection_note' => 'البيانات غير مكتملة',
        ]);

        $this->assertSame(0, Client::query()->count());
    }
}
