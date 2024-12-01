<?php

namespace Database\Seeders;

use App\Models\Itemjurnal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Menu untuk DAILY
           DB::table('menus')->insert([
            [
                'name' => 'Bible Reading',
                'route' => 'BibleReading.index',
                'icon' => 'fas fa-book-reader',
                'type' => 'daily',
                'status' => 'inactive',
            ],
            [
                'name' => 'Memorizing Verses',
                'route' => 'MemorizingVerses.index',
                'icon' => 'fas fa-book',
                'type' => 'daily',
                'status' => 'inactive',
            ],
            [
                'name' => 'Hymns',
                'route' => 'Hymns.index',
                'icon' => 'fas fa-music',
                'type' => 'daily',
                'status' => 'inactive', // Non-aktifkan sementara
            ],
            [
                'name' => '5 Times Prayer',
                'route' => 'fiveTimesPrayer.index',
                'icon' => 'fas fa-praying-hands',
                'type' => 'daily',
                'status' => 'inactive',
            ],
            [
                'name' => 'Personal Goals',
                'route' => 'personalgoal.index',
                'icon' => 'fas fa-tasks',
                'type' => 'daily',
                'status' => 'inactive',
            ],
            [
                'name' => 'Good Land',
                'route' => 'goodland.index',
                'icon' => 'fas fa-flag',
                'type' => 'daily',
                'status' => 'inactive', // Non-aktifkan sementara
            ],
            [
                'name' => 'Prayer Book',
                'route' => 'prayerbook.index',
                'icon' => 'fas fa-book',
                'type' => 'daily',
                'status' => 'inactive',
            ],
        ]);

        // Menu untuk WEEKLY
        DB::table('menus')->insert([
            [
                'name' => 'Summary Of Ministry',
                'route' => 'ministri.index',
                'icon' => 'fas fa-clipboard-list',
                'type' => 'weekly',
                'status' => 'inactive',
            ],
            [
                'name' => 'Fellowship',
                'route' => 'fellowship.index',
                'icon' => 'fas fa-users',
                'type' => 'weekly',
                'status' => 'inactive', // Non-aktifkan sementara
            ],
            [
                'name' => 'Script Ts & Exhibition',
                'route' => 'pameran.index',
                'icon' => 'fas fa-book-reader',
                'type' => 'weekly',
                'status' => 'inactive',
            ],
            [
                'name' => 'Agenda',
                'route' => 'agenda.index',
                'icon' => 'fas fa-calendar-alt',
                'type' => 'weekly',
                'status' => 'inactive', // Non-aktifkan sementara
            ],
        ]);

        // Menu untuk REPORT
        DB::table('menus')->insert([
            [
                'name' => 'Financial Statements',
                'route' => 'keuangan.index',
                'icon' => 'fas fa-file-invoice-dollar',
                'type' => 'report',
                'status' => 'inactive',
            ],
            [
                'name' => 'Weekly Journal Report',
                'route' => 'report.index',
                'icon' => 'fas fa-book',
                'type' => 'report',
                'status' => 'inactive',
            ],
        ]);
    }
}
