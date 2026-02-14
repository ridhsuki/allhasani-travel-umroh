<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'H. Ahmad Syauqi',
                'title' => 'Umroh Ramadhan 2023',
                'content' => 'Alhamdulillah, pelayanan All Hasani Travel sangat memuaskan. Muthawif sangat berilmu dan sabar membimbing kami. Hotelnya benar-benar dekat dengan Masjidil Haram sesuai janji.',
                'photo_path' => null,
            ],
            [
                'name' => 'Hj. Siti Aminah',
                'title' => 'Umroh Plus Turki, Okt 2023',
                'content' => 'Perjalanan spiritual yang luar biasa. Tour Turkinya sangat menyenangkan, makanan enak, dan jadwal tertata rapi. Sangat merekomendasikan paket Plus Turki ini untuk keluarga.',
                'photo_path' => null,
            ],
            [
                'name' => 'Budi Santoso & Keluarga',
                'title' => 'Umroh Private, Des 2023',
                'content' => 'Kami mengambil paket private untuk 5 orang. Fasilitas kendaraan private sangat nyaman. Tim All Hasani sangat responsif 24 jam membantu kebutuhan orang tua kami yang memakai kursi roda.',
                'photo_path' => null,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
