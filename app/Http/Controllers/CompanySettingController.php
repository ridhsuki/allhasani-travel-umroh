<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CompanySettingController extends Controller
{
    public function edit()
    {
        $setting = CompanySetting::first() ?? new CompanySetting();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $data = $request->validated();

        $setting = CompanySetting::first();

        if ($request->hasFile('logo')) {
            if ($setting && $setting->logo_path) {
                Storage::disk('public')->delete($setting->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('uploads/logo', 'public');
        }

        unset($data['logo']);

        if (!isset($data['branches'])) {
            $data['branches'] = [];
        }

        if ($setting) {
            $setting->update($data);
        } else {
            CompanySetting::create($data);
        }

        Cache::forget('company_settings');

        return redirect()->back()->with('success', 'Informasi perusahaan berhasil diperbarui.');
    }
}
