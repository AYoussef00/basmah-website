<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'interest' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'note' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
