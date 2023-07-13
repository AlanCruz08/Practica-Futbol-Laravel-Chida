<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\estadio;

class EstadioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadios = [
            [
                'nombre' => 'Azteca',
                'pais' => 'Mexico',
                'capacidad' => 86264,
            ],
            [
                'nombre' => 'Alfonso Lastras Ramirez',
                'pais' => 'Mexico',
                'capacidad' => 25709,
            ],
            [
                'nombre' => 'Jalisco',
                'pais' => 'Mexico',
                'capacidad' => 55020,
            ],
            [
                'nombre' => 'Akron',
                'pais' => 'Mexico',
                'capacidad' => 46232,
            ],
            [
                'nombre' => 'Olimpico Benito Juarez',
                'pais' => 'Mexico',
                'capacidad' => 19703,
            ],
            [
                'nombre' => 'Nou Camp',
                'pais' => 'Mexico',
                'capacidad' => 31297,
            ],
            [
                'nombre' => 'El Kraken',
                'pais' => 'Mexico',
                'capacidad' => 20195,
            ],
            [
                'nombre' => 'BBVA Bancomer',
                'pais' => 'Mexico',
                'capacidad' => 51348,
            ],
            [
                'nombre' => 'Victoria',
                'pais' => 'Mexico',
                'capacidad' => 25500,
            ],
        ];

        foreach ($estadios as $estadio) {
            Estadio::create($estadio);
        }
    }
}
