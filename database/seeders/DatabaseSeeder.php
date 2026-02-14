<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'phone' => '6285877524373',
                'email_verified_at' => now(),
            ]
        );

        $this->call([
            PackageSeeder::class,
            CompanySettingSeeder::class,
            TestimonialSeeder::class,
        ]);

        $this->command->info('Admin user created.');
    }
}
