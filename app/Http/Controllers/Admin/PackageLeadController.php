<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RejectPackageLeadRequest;
use App\Models\Client;
use App\Models\Lead;
use App\Support\Packages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PackageLeadController extends Controller
{
    public function approve(Lead $lead): RedirectResponse
    {
        abort_unless($lead->isPackageRequest(), 404);
        abort_unless($lead->isPending(), 403);

        DB::transaction(function () use ($lead): void {
            $lead->update([
                'status' => 'approved',
                'rejection_note' => null,
                'reviewed_at' => now(),
            ]);

            Client::query()->updateOrCreate(
                ['lead_id' => $lead->id],
                [
                    'name' => $lead->name,
                    'phone' => $lead->phone,
                    'package' => $lead->interest,
                    'activity_type' => $lead->note,
                    'monthly_amount' => Packages::monthlyAmount($lead->interest),
                    'status' => 'active',
                    'started_at' => now(),
                ],
            );
        });

        return redirect()
            ->route('dashboard')
            ->with('success', 'تم اعتماد الطلب وتحويله إلى عميل.');
    }

    public function reject(RejectPackageLeadRequest $request, Lead $lead): RedirectResponse
    {
        abort_unless($lead->isPackageRequest(), 404);
        abort_unless($lead->isPending(), 403);

        $lead->update([
            'status' => 'rejected',
            'rejection_note' => $request->validated('rejection_note'),
            'reviewed_at' => now(),
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'تم رفض طلب الباقة.');
    }
}
