<?php

namespace Database\Seeders;

use App\Models\JamAbsen;
use Illuminate\Database\Seeder;

class JamAbsenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JamAbsen::insert([
            'jam_masuk' => '08:00',
            'jam_pulang' => '11:30'
        ]);
    }
}
