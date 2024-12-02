<?php

namespace Database\Seeders;

use App\Models\Search;
use Illuminate\Database\Seeder;

class SearchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'page' => 'Dashboard Student',
                'desc' => 'Student Dashboard/Home Page',
                'name' => 'student.dashboard',
                'href' => '/student/dashboard',
                'auth' => 'student'
            ],
            [
                'page' => 'Change Password',
                'desc' => 'Change Your Password',
                'name' => 'profile.edit',
                'href' => '/profile',
                'auth' => 'student'
            ],
            [
                'page' => 'Dashboard Admin',
                'desc' => 'Admin Dashboard/Home Page',
                'name' => 'admin.dashboard',
                'href' => '/admin/dashboard',
                'auth' => 'admin'
            ],
            [
                'page' => 'Managed Absen',
                'desc' => 'Managed Student Absen',
                'name' => 'admin.absens',
                'href' => '/admin/absens',
                'auth' => 'admin'
            ],
            [
                'page' => 'Absen Daily',
                'desc' => 'See Student Absen (daily)',
                'name' => 'admin.absen.daily-sort',
                'href' => '/admin/daily/absen',
                'auth' => 'admin'
            ],
            [
                'page' => 'Jam Absen',
                'desc' => 'Managed Jam Absen',
                'name' => 'admin.absen.jamAbsen.index',
                'href' => '/admin/jamAbsen',
                'auth' => 'admin'
            ],
            [
                'page' => 'Preview Rayon',
                'desc' => 'Show Existed Rayon',
                'name' => 'admin.rayon.index',
                'href' => '/admin/rayon',
                'auth' => 'admin'
            ],
            [
                'page' => 'Preview Rombel',
                'desc' => 'Show Existed Rombel',
                'name' => 'admin.rombel.index',
                'href' => '/admin/rombel',
                'auth' => 'admin'
            ],
            [
                'page' => 'Preview User',
                'desc' => 'Show Existed User in General',
                'name' => 'admin.user.index',
                'href' => '/admin/user',
                'auth' => 'admin'
            ],
            [
                'page' => 'Preview Admin',
                'desc' => 'Show Existed User Admin',
                'name' => 'admin.admin-sort',
                'href' => '/admin/adminSort',
                'auth' => 'admin'
            ],
            [
                'page' => 'Preview Student',
                'desc' => 'Show Existed User Student',
                'name' => 'admin.student-sort',
                'href' => '/admin/studentSort',
                'auth' => 'admin'
            ],
            [
                'page' => 'Change Password',
                'desc' => 'Change Your Password',
                'name' => 'profile.edit',
                'href' => '/profile',
                'auth' => 'admin'
            ],
        ];

        Search::insert($pages);
    }
}
