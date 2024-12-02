<?php

namespace Database\Seeders;

use App\Models\Absen;
use Illuminate\Database\Seeder;

class AbsenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $absen = [
            [
                'nis_id' => '1',
                'tgl' => '2022-01-12',
                'ket' => 'hadir'
            ],
            [
                'nis_id' => '1',
                'tgl' => '2022-01-13',
                'ket' => 'hadir'
            ]
        ];

        Absen::insert($absen);
    }
}
