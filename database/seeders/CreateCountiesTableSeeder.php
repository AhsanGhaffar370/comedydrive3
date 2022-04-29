<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\County;
use Carbon\Carbon;

class CreateCountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        County::insert([
            [
                'name' => 'Anderson-JP 1',
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Anderson-JP 2',
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Anderson-JP 3',
                'state_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
