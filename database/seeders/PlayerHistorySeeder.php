<?php

namespace Database\Seeders;

use App\Models\PlayerHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlayerHistory::create([
            'player_id'         => 1,
            'event_location_id' => 1,
            'tee_off'           => "1",
            'out'               => 54,
            'in'                => 51,
            'gross'             => 105,
            'handicap'          => 28,
            'net'               => 77,
        ]);

        PlayerHistory::create([
            'player_id'         => 2,
            'event_location_id' => 1,
            'tee_off'           => "1",
            'out'               => 50,
            'in'                => 45,
            'gross'             => 95,
            'handicap'          => 23,
            'net'               => 72,
        ]);

        PlayerHistory::create([
            'player_id'         => 1,
            'event_location_id' => 2,
            'tee_off'           => "10",
            'out'               => 45,
            'in'                => 45,
            'gross'             => 90,
            'handicap'          => 18,
            'net'               => 72,
        ]);
    }
}
