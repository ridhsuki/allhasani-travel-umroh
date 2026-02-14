<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'PT Al Hasani',
                'logo_path' => null,
                'address_head_office' => "Gedung Menara 165, Lantai 4\nJl. TB Simatupang Kav. 1, Cilandak\nJakarta Selatan, DKI Jakarta 12560",
                'operational_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB | Sabtu: 09.00 - 13.00 WIB',

                'wa_number_indo' => '+62 21 1234 5678',
                'wa_number_saudi' => '+96 812 3456 7890',
                'email_primary' => 'info@allhasani-travel.com',
                'email_secondary' => 'support@allhasani-travel.com',

                'social_media' => [
                    'facebook' => 'https://www.facebook.com/allhasani',
                    'instagram' => 'https://www.instagram.com/allhasani_travel',
                    'youtube' => 'https://www.youtube.com/@allhasani_tv',
                    'tiktok' => 'https://www.tiktok.com/@allhasani_official',
                ],

                'branches' => [
                    [
                        'name' => 'Cabang Surabaya',
                        'address' => 'Jl. Tunjungan No. 55, Genteng, Surabaya, Jawa Timur'
                    ],
                    [
                        'name' => 'Cabang Bandung',
                        'address' => 'Jl. Ir. H. Juanda No. 102 (Dago), Bandung, Jawa Barat'
                    ],
                    [
                        'name' => 'Cabang Makassar',
                        'address' => 'Jl. A.P. Pettarani Ruko Diamond No. 8, Makassar'
                    ]
                ],
            ]
        );
    }
}
