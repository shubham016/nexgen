<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Indoor Camera',    'slug' => 'indoor-camera',    'description' => 'Cameras designed for indoor surveillance.'],
            ['name' => 'Outdoor Camera',   'slug' => 'outdoor-camera',   'description' => 'Weatherproof cameras for outdoor use.'],
            ['name' => 'PTZ Camera',       'slug' => 'ptz-camera',       'description' => 'Pan-Tilt-Zoom cameras for wide-area coverage.'],
            ['name' => 'Dome Camera',      'slug' => 'dome-camera',      'description' => 'Discreet dome-shaped cameras for ceiling mount.'],
            ['name' => 'Bullet Camera',    'slug' => 'bullet-camera',    'description' => 'Long-range cylindrical cameras.'],
            ['name' => 'DVR System',       'slug' => 'dvr-system',       'description' => 'Digital Video Recorder systems for analog cameras.'],
            ['name' => 'NVR System',       'slug' => 'nvr-system',       'description' => 'Network Video Recorder systems for IP cameras.'],
            ['name' => 'Wireless Camera',  'slug' => 'wireless-camera',  'description' => 'WiFi-enabled cameras without cable runs.'],
            ['name' => 'Solar Camera',     'slug' => 'solar-camera',     'description' => 'Solar-powered cameras for remote locations.'],
            ['name' => 'Doorbell Camera',  'slug' => 'doorbell-camera',  'description' => 'Smart video doorbells with two-way audio.'],
            ['name' => 'Networking',       'slug' => 'networking',       'description' => 'PoE switches, NVR accessories and network gear.'],
            ['name' => 'Complete Kit',     'slug' => 'complete-kit',     'description' => 'Ready-to-install camera packages with all accessories.'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $category['slug']],
                array_merge($category, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
