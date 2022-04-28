<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class CreateUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make Admin
        User::insert([
            [ // 1
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin123123'),
                'role_id' => 1,
                'status' => 1,
                'step' => 2
            ],
            [ // 1
                'email' => 'student@student.com',
                'password' => bcrypt('student123'),
                'role_id' => 2,
                'status' => 1,
                'step' => 2
            ]
        ]);
    }
}
