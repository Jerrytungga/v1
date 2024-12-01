<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Sample data for daily menu items
          MenuItem::create([
            'title' => 'Bible Reading',
            'route' => 'bible-asisten',
            'status' => 'active',
            'type' => 'daily',
        ]);

        MenuItem::create([
            'title' => 'Memorizing Verses',
            'route' => 'Memorizing_verses-Asisten',
            'status' => 'active',
            'type' => 'daily',
        ]);

        MenuItem::create([
            'title' => 'Hymns',
            'route' => 'Hymns-Asisten',
            'status' => 'active',
            'type' => 'daily',
        ]);

        MenuItem::create([
            'title' => '5 Times Prayer',
            'route' => 'Fivetimeprayer-Asisten',
            'status' => 'active',
            'type' => 'daily',
        ]);

        MenuItem::create([
            'title' => 'Personal Goals',
            'route' => 'personalgoals-Asisten',
            'status' => 'active',
            'type' => 'daily',
        ]);

        MenuItem::create([
            'title' => 'Good Land',
            'route' => 'Goodland-asisten',
            'status' => 'active',
            'type' => 'daily',
        ]);

        MenuItem::create([
            'title' => 'Prayer Book',
            'route' => 'Prayerbook-asisten',
            'status' => 'active',
            'type' => 'daily',
        ]);

        // Sample data for weekly menu items
        MenuItem::create([
            'title' => 'Ministry Summary',
            'route' => 'Ministry-Asisten',
            'status' => 'active',
            'type' => 'weekly',
        ]);

        MenuItem::create([
            'title' => 'Fellowship',
            'route' => 'Fellowship-Asisten',
            'status' => 'active',
            'type' => 'weekly',
        ]);

        MenuItem::create([
            'title' => 'Script Ts & Exhibition',
            'route' => 'Script-Asisten',
            'status' => 'active',
            'type' => 'weekly',
        ]);

        MenuItem::create([
            'title' => 'Agenda',
            'route' => 'Agenda-Asisten',
            'status' => 'active',
            'type' => 'weekly',
        ]);

        MenuItem::create([
            'title' => 'Financial Statements',
            'route' => 'Financial-Asisten',
            'status' => 'active',
            'type' => 'weekly',
        ]);

        MenuItem::create([
            'title' => 'Journal Report',
            'route' => 'Report-Asisten',
            'status' => 'active',
            'type' => 'weekly',
        ]);

        MenuItem::create([
            'title' => 'Personal Goals Assignment',
            'route' => 'Assignment-Asisten',
            'status' => 'active',
            'type' => 'weekly',
        ]);
    }
}
