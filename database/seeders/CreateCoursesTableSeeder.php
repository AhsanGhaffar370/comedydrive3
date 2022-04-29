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
                'name' => '$25 Ticket Dismissal & Insurance Discount',
                'state_id' => 1,
                'price' => '$25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$25 Insurance Discount ONLY',
                'state_id' => 1,
                'price' => '$25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '$48 Ticket Dismissal + Driving Record',
                'state_id' => 1,
                'price' => '$48',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
