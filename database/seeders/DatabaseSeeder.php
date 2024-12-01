<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ViewReportSeeder::class,
            AdminSeeder::class,
            WeeklySeeder::class,
            MenuSeeder::class,
            MenuItemSeeder::class,
            // Add other seeders as needed
        ]);
    }
}
