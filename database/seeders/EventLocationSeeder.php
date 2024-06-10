<?php

namespace Database\Seeders;

use App\Models\EventLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventLocation::create([
            'location_id' => '1',
            'start_date'  => '2023-10-20',
        ]);

        EventLocation::create([
            'location_id' => '2',
            'start_date'  => '2023-10-26',
        ]);
    }
}
