<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Report;
use App\Models\Classification;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dzaky Syahrizal',
            'email' => 'dzaky@gmail.com',
            'nik' => '3206330408980001',
            'alamat' => 'Kp. Sukasenang',
            'rt/rw' => '03/03',
            'password' => bcrypt('password')
        ]);

        User::factory(4)->create();

        Report::factory(40)->create();

        Classification::create([
            'name' => 'Pengaduan',
            'slug' => 'pengaduan'
        ]);

        Classification::create([
            'name' => 'Aspirasi',
            'slug' => 'aspirasi'
        ]);

        Classification::create([
            'name' => 'Permintaan Informasi',
            'slug' => 'permintaan-informasi'
        ]);
    }
}
