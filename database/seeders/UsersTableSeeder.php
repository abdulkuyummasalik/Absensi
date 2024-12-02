<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'email' => 'admin@material.com',
            'username' => 'admin1',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::insert([
            'email' => 'student@material.com',
            'username' => 's1',
            'email_verified_at' => now(),
            'password' => Hash::make('pass'),
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::insert([
            'email' => 'marsha@gmail.com',
            'username' => 'marshak',
            'email_verified_at' => now(),
            'password' => Hash::make('pass'),
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
