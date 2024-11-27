<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeeklySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insert data for PT1 to PT3
         DB::table('weekly')->insert([
            [
                'Week' => 'PT 1',
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Week' => 'PT 2',
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Week' => 'PT 3',
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Insert data for WEEK 1 to WEEK 17
        $weeks = [];
        for ($i = 1; $i <= 17; $i++) {
            $weeks[] = [
                'Week' => 'WEEK ' . $i,
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('weekly')->insert($weeks);

        // Insert data for EVALUASI 1 to EVALUASI 3
        $evaluasi = [];
        for ($i = 1; $i <= 3; $i++) {
            $evaluasi[] = [
                'Week' => 'EVALUASI ' . $i,
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('weekly')->insert($evaluasi);
    }
}
