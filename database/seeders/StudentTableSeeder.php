<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::insert([
            'nis' => 12007880,
            'nama' => 'Macca',
            'jk' => 'p',
            'rombel_id' => '1',
            'rayon_id' => '2',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Student::insert([
            'nis' => 12007881,
            'nama' => 'Marsha',
            'jk' => 'p',
            'rombel_id' => '1',
            'rayon_id' => '4',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
