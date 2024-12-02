<?php

namespace Database\Seeders;

use App\Models\Rombel;
use Illuminate\Database\Seeder;

class RombelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rombel = [
            [
                'rombel' => 'RPL',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rombel' => 'TKJ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rombel' => 'MMD',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rombel' => 'OTKP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rombel' => 'BDP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rombel' => 'TBG',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rombel' => 'HTL',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];


        Rombel::insert($rombel);
    }
}
