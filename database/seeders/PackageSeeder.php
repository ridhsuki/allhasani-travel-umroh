<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Umrah Reguler 9 Hari',
                'badge' => 'populer',
                'price' => 24500000,
                'duration_days' => 9,
                'max_pax' => 45,
                'features' => [
                    'Tiket Pesawat Ekonomi (Direct)',
                    'Hotel Makkah Bintang 4 (300m)',
                    'Hotel Madinah Bintang 4 (150m)',
                    'Makan 3x Sehari (Menu Indonesia)',
                    'Transportasi Bus AC Terbaru',
                    'Muthawif Berpengalaman',
                ],
                'bonus' => 'Air Zamzam 5 Liter',
                'is_active' => true,
            ],
            [
                'name' => 'Umrah Plus Turki 12 Hari',
                'badge' => 'eksklusif',
                'price' => 35000000,
                'duration_days' => 12,
                'max_pax' => 30,
                'features' => [
                    'Tiket Pesawat Turkish Airlines',
                    'Hotel Bintang 5 Makkah (Zamzam Tower)',
                    'Hotel Bintang 5 Madinah (Front Row)',
                    'City Tour Istanbul 3 Hari',
                    'Makan Fullboard Premium',
                    'Lounge Access Bandara',
                ],
                'bonus' => 'Free Kereta Cepat Haramain',
                'is_active' => true,
            ],
            [
                'name' => 'Umrah Hemat Akhir Tahun',
                'badge' => 'hemat',
                'price' => 21900000,
                'duration_days' => 9,
                'max_pax' => 50,
                'features' => [
                    'Tiket Pesawat Ekonomi (Transit)',
                    'Hotel Makkah Bintang 3 (Shuttle)',
                    'Hotel Madinah Bintang 3',
                    'Makan 3x Sehari Catering',
                    'Bus AC Standar',
                ],
                'bonus' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Umrah Hemat Akhir Tahun dummy gak aktif',
                'badge' => 'hemat',
                'price' => 21900000,
                'duration_days' => 9,
                'max_pax' => 50,
                'features' => [
                    'Tiket Pesawat Ekonomi (Transit)',
                    'Hotel Makkah Bintang 3 (Shuttle)',
                    'Hotel Madinah Bintang 3',
                    'Makan 3x Sehari Catering',
                    'Bus AC Standar',
                ],
                'bonus' => null,
                'is_active' => false,
            ],
        ];

        foreach ($packages as $pkg) {
            $pkg['slug'] = Str::slug($pkg['name']);
            Package::create($pkg);
        }
    }
}
