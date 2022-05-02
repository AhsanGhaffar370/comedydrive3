<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use Carbon\Carbon;

class CreateStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
            [
                'name' => 'Florida',
                'code' => 'FL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'New Mexico',
                'code' => 'MX',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Texas',
                'code' => 'TX',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
