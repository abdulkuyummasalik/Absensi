<?php

namespace Database\Seeders;

use App\Models\HariAbsen;
use Illuminate\Database\Seeder;

class HariAbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            [
                'senin' => true,
                'selasa' => true,
                'rabu' => true,
                'kamis' => true,
                'jumat' => true,
                'sabtu' => true,
                'minggu' => false,
            ]
        ];

        HariAbsen::insert($days);
    }
}
