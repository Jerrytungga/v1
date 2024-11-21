<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ViewreportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('viewreport')->insert([
            'setting_name' => 'Rabu',           // The name of the setting
            'day_of_week' => 3,                 // Day of the week (1 for Monday, 2 for Tuesday, etc.)
            'input_time' => '01:12:00',         // Time for the setting
            'created_at' => Carbon::now(),      // Created at timestamp
            'updated_at' => Carbon::now(),      // Updated at timestamp
        ]);
    
    }
}
