<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreateStatesTableSeeder::class);
        $this->call(CreateCoursesTableSeeder::class);
        $this->call(CreateCountiesTableSeeder::class);
        $this->call(CreateRolesTableSeeder::class);
        $this->call(CreateUsersTableSeeder::class);
    }
}
