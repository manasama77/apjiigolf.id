<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::create([
            'code'       => 'PGA2023001',
            'name'       => 'MUHAMMAD ARIEF',
            'total_play' => '2',
            'gross'      => '97.50',
            'handicap'   => '23',
            'net'        => '74.5',
            'seq'        => '1',
        ]);

        Player::create([
            'code'       => 'PGA2023002',
            'name'       => 'SAMUEL A P',
            'total_play' => '1',
            'gross'      => '95',
            'handicap'   => '23',
            'net'        => '72',
            'seq'        => '2',
        ]);
    }
}
