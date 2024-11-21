<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            'name' => 'Admin',            // Set the admin's name
            'username' => 'admin',    // Set the admin's username
            'password' => 'admin',  // Hash the password before saving
            'created_at' => Carbon::now(),     // Set the created_at timestamp
            'updated_at' => Carbon::now(),     // Set the updated_at timestamp
        ]);
    }
}
