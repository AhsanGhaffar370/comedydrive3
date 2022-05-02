<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Carbon\Carbon;

class CreateCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
            [
                'name' => '$24 BDI Election',
                'state_id' => 1,
                'price' => '$24',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$24 BDI for DMV(TCAC)',
                'state_id' => 1,
                'price' => '$24',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$24 Ordered by the Court',
                'state_id' => 1,
                'price' => '$24',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$22 BDI for Insurance',
                'state_id' => 1,
                'price' => '$22',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$29 6hr Online Defensive Driving',
                'state_id' => 2,
                'price' => '$29',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$25 6hr Insurance Discount ONLY',
                'state_id' => 2,
                'price' => '$25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$25 Ticket Dismissal & Insurance Discount',
                'state_id' => 3,
                'price' => '$25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$25 Insurance Discount ONLY',
                'state_id' => 3,
                'price' => '$25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$48 Ticket Dismissal + Driving Record',
                'state_id' => 3,
                'price' => '$48',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
