<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\equipo;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipos = [
            [
                'nombre' => 'Club America',
                'dir_deportivo' => 'Santiago Baños',
                'estadio_id' => 1,
            ],
            [
                'nombre' => 'Club Atletico de SanLuis',
                'dir_deportivo' => 'Rodrigo Incera',
                'estadio_id' => 2,
            ],
            [
                'nombre' => 'Club Atlas',
                'dir_deportivo' => 'Jose Riestra',
                'estadio_id' => 3,
            ],
            [
                'nombre' => 'Club Guadalajara',
                'dir_deportivo' => 'Fernando Hierro',
                'estadio_id' => 4,
            ],
            [
                'nombre' => 'Club Cruz Azul',
                'dir_deportivo' => 'Joaquin Moreno',
                'estadio_id' => 1,
            ],
            [
                'nombre' => 'FC Juarez',
                'dir_deportivo' => 'Humberto Valdes',
                'estadio_id' => 5,
            ],
            [
                'nombre' => 'Club Leon',
                'dir_deportivo' => 'Rodrigo Fernandez',
                'estadio_id' => 6,
            ],
            [
                'nombre' => 'Club Mazatlan',
                'dir_deportivo' => 'Carlos Vela',
                'estadio_id' => 7,
            ],
            [
                'nombre' => 'Club Monterrey',
                'dir_deportivo' => 'Jose Antonio Noriega',
                'estadio_id' => 8,
            ],
            [
                'nombre' => 'Club Necaxa',
                'dir_deportivo' => 'Jose Hanan',
                'estadio_id' => 9,
            ],
        ];

        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
    }
}
