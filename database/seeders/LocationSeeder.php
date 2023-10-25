<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name'    => 'Sentul Highlands Golf Club',
            'address' => 'Cijayanti, Babakan Madang, Bogor Regency, West Java 16810',
            'contact' => '02187960268',
            'out'     => 36,
            'in'      => 36,
            'banner'  => 'banner/Sentul-Highlands-Golf-Club.jpg',
        ]);

        Location::create([
            'name'    => 'Bogor Raya',
            'address' => ' Perumahan Klub Golf, Jl. Golf Estate Bogor Raya, Sukaraja, Kec. Sukaraja, Kabupaten Bogor, Jawa Barat 16710',
            'contact' => '082114578976',
            'out'     => 36,
            'in'      => 36,
            'banner'  => 'banner/bogor_raya.png',
        ]);
    }
}
