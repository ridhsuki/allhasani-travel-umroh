<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanySetting extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'social_media' => 'array',
        'branches' => 'array',
    ];

    public function getLogoUrlAttribute()
    {
        if ($this->logo_path && Storage::disk('public')->exists($this->logo_path)) {
            return Storage::url($this->logo_path);
        }
        return asset('assets/img/default-logo.png');
    }
}
