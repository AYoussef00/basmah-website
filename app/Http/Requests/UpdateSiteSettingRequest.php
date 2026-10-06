<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:120'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
