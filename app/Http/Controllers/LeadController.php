<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): JsonResponse
    {
        $lead = Lead::query()->create([
            ...$request->validated(),
            'status' => 'new',
        ]);

        return response()->json([
            'message' => 'تم استلام طلبك بنجاح.',
            'id' => $lead->id,
        ], 201);
    }
}
