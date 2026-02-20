<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 11; $i++) {

            $isActive = $i !== 11;

            Package::create([
                'name' => "Contoh Paket {$i}",
                'slug' => Str::slug("Contoh Paket {$i}"),
                'description' => $this->formatDescription($i),
                'is_active' => $isActive,
            ]);
        }
    }

    private function formatDescription($number)
    {
        $price = number_format(20000000 + ($number * 500000), 0, ',', '.');
        $duration = 7 + ($number % 5);
        $maxJamaah = 30 + ($number * 2);

        return <<<HTML
<h2>Deskripsi Paket Contoh {$number}</h2>
<p>Harga: <strong>Rp {$price}</strong></p>
<p>Durasi: <strong>{$duration} Hari</strong></p>
<p>Maksimal Jamaah: <strong>{$maxJamaah}</strong></p>

<h3>Fasilitas:</h3>
<ul>
    <li>Tiket Pesawat Ekonomi</li>
    <li>Hotel Bintang 3 / 4</li>
    <li>Makan 3x Sehari</li>
    <li>Transportasi Bus AC</li>
    <li>Pembimbing Ibadah</li>
</ul>

<h3>Bonus:</h3>
<p>Merchandise Eksklusif</p>
HTML;
    }
}
