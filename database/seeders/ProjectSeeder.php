<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'title' => 'Weather Station with ESP32',
            'slug' => 'weather-station-esp32',
            'description' => 'A smart weather station built using ESP32, sensors, and IoT technology.',
            'image' => 'images/weather-station.jpg',
        ]);
    }
}
