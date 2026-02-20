<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'badge' => ['nullable', 'in:populer,rekomendasi,eksklusif,hemat'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'max_pax' => ['required', 'integer', 'min:1'],
            'features' => ['required', 'array'],
            'features.*' => ['string'],
            'bonus' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->features && is_string($this->features)) {
            $this->merge([
                'features' => array_filter(array_map('trim', explode("\n", $this->features))),
            ]);
        }
    }
}
