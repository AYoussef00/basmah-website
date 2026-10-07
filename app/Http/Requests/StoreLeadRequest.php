<?php

namespace App\Http\Requests;

use App\Models\Addon;
use App\Support\Packages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $allowedInterests = [
            ...Addon::query()->active()->pluck('title')->all(),
            ...Packages::names(),
        ];

        return [
            'interest' => ['required', 'string', 'max:120', Rule::in($allowedInterests)],
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'note' => ['nullable', 'string', 'max:2000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'interest.in' => 'يرجى اختيار خدمة أو باقة من القائمة المتاحة.',
        ];
    }
}
