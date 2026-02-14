<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $packages = [
            [
                'name' => 'Paket Ekonomis',
                'price' => 'Rp 29.500.000',
                'duration' => '12 Hari | Max. 30 Jamaah',
                'badge' => 'Populer',
                'features' => [
                    'Tiket pesawat pulang-pergi (Economy)',
                    'Akomodasi hotel bintang 3',
                    'Konsumsi 3x sehari (Menu Indonesia)',
                    'Transportasi bus AC',
                    'Bimbingan manasik & spiritual guide',
                    'Visa umroh & asuransi perjalanan'
                ],
                'bonus' => 'Tas umroh eksklusif + buku doa + air zamzam 5L'
            ],
            [
                'name' => 'Paket Reguler',
                'price' => 'Rp 39.500.000',
                'duration' => '14 Hari | Max. 25 Jamaah',
                'badge' => 'Rekomendasi',
                'features' => [
                    'Tiket pesawat pulang-pergi (Economy)',
                    'Akomodasi hotel bintang 4 dekat masjid',
                    'Konsumsi 3x sehari menu spesial',
                    'Transportasi bus VIP',
                    'Bimbingan manasik lengkap + ziarah',
                    'Visa umroh & asuransi komprehensif'
                ],
                'bonus' => 'Perlengkapan ihram premium + tour Jabal Uhud'
            ],
            [
                'name' => 'Paket Reguler',
                'price' => 'Rp 39.500.000',
                'duration' => '14 Hari | Max. 25 Jamaah',
                'badge' => 'Rekomendasi',
                'features' => [
                    'Tiket pesawat pulang-pergi (Economy)',
                    'Akomodasi hotel bintang 4 dekat masjid',
                    'Konsumsi 3x sehari menu spesial',
                    'Transportasi bus VIP',
                    'Bimbingan manasik lengkap + ziarah',
                    'Visa umroh & asuransi komprehensif'
                ],
                'bonus' => 'Perlengkapan ihram premium + tour Jabal Uhud'
            ],
        ];

        return view('landing', compact('packages'));
    }
}
