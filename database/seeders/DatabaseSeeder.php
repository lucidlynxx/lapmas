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
