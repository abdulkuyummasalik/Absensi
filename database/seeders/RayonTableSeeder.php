<?php

namespace Database\Seeders;

use App\Models\Rayon;
use Illuminate\Database\Seeder;

class RayonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rayon = [
            [
                'rayon' => 'Ciawi',
                'pembimbing' => 'Guru1',
                'no_hp_pembimbing' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rayon' => 'Cibedug',
                'pembimbing' => 'Guru2',
                'no_hp_pembimbing' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rayon' => 'Cicurug',
                'pembimbing' => 'Guru3',
                'no_hp_pembimbing' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rayon' => 'Cisarua',
                'pembimbing' => 'Guru4',
                'no_hp_pembimbing' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rayon' => 'Sukasari',
                'pembimbing' => 'Guru5',
                'no_hp_pembimbing' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rayon' => 'Tajur',
                'pembimbing' => 'Guru6',
                'no_hp_pembimbing' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rayon' => 'Wikrama',
                'pembimbing' => 'Guru7',
                'no_hp_pembimbing' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Rayon::insert($rayon);
    }
}
