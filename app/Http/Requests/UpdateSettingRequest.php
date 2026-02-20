<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'address_head_office' => 'required|string',
            'operational_hours' => 'required|string',
            'wa_number_indo' => 'required|string',
            'wa_number_saudi' => 'nullable|string',
            'email_primary' => 'required|email',
            'email_secondary' => 'nullable|email',

            'social_media' => 'nullable|array',
            'social_media.facebook' => 'nullable|url',
            'social_media.instagram' => 'nullable|url',
            'social_media.youtube' => 'nullable|url',
            'social_media.tiktok' => 'nullable|url',

            'branches' => 'nullable|array',
            'branches.*.name' => 'required|string',
            'branches.*.address' => 'required|string',

            'stats' => 'required|array',
            'stats.jamaah' => 'required|numeric|min:0',
            'stats.satisfaction' => 'required|numeric|between:0,100',
            'stats.experience' => 'required|numeric|min:0',
            'stats.departures' => 'required|numeric|min:0',
        ];
    }
}
