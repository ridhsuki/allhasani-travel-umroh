<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Number;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'badge',
        'price',
        'duration_days',
        'max_pax',
        'features',
        'bonus',
    ];

    protected $casts = [
        'features' => 'array',
        'price' => 'integer',
    ];

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
