<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\futbolista;

class FutbolistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $futbolistas = [
            [
                'nombre' => 'Luis Angel',
                'ap_paterno' => 'Malagon',
                'ap_materno' => 'Velazquez',
                'alias' => null,
                'no_camiseta' => 1,
            ],
            [
                'nombre' => 'Oscar Francisco',
                'ap_paterno' => 'Jimenez',
                'ap_materno' => 'Fabela',
                'alias' => null,
                'no_camiseta' => 27,
            ],
            [
                'nombre' => 'Kevin Nahin',
                'ap_paterno' => 'Alvarez',
                'ap_materno' => 'Campos',
                'alias' => null,
                'no_camiseta' => 5,
            ],
            [
                'nombre' => 'Nestor Alejandro',
                'ap_paterno' => 'Araujo',
                'ap_materno' => 'Razo',
                'alias' => null,
                'no_camiseta' => 14,
            ],
            [
                'nombre' => 'Sabastian Enzo',
                'ap_paterno' => 'Caceres',
                'ap_materno' => 'Ramos',
                'alias' => null,
                'no_camiseta' => 4,
            ],
            [
                'nombre' => 'Israel',
                'ap_paterno' => 'Reyes',
                'ap_materno' => 'Romero',
                'alias' => null,
                'no_camiseta' => 3,
            ],
            [
                'nombre' => 'Miguel Arturo',
                'ap_paterno' => 'Layun',
                'ap_materno' => 'Prado',
                'alias' => null,
                'no_camiseta' => 19,
            ],
            [
                'nombre' => 'Luis Fernando',
                'ap_paterno' => 'Fuentes',
                'ap_materno' => 'Vargas',
                'alias' => null,
                'no_camiseta' => 2,
            ],
            [
                'nombre' => 'Emilio',
                'ap_paterno' => 'Lara',
                'ap_materno' => 'Contreras',
                'alias' => null,
                'no_camiseta' => 23,
            ],
            [
                'nombre' => 'Diego Alfonso',
                'ap_paterno' => 'Valdes',
                'ap_materno' => 'Contreras',
                'alias' => null,
                'no_camiseta' => 10,
            ],
            [
                'nombre' => 'Alvaro',
                'ap_paterno' => 'Fidalgo',
                'ap_materno' => 'Fernandez',
                'alias' => 'Mago',
                'no_camiseta' => 8,
            ],
            [
                'nombre' => 'Richard Rafael',
                'ap_paterno' => 'Sanchez',
                'ap_materno' => 'Guerrero',
                'alias' => 'cachorro',
                'no_camiseta' => 20,
            ],
            [
                'nombre' => 'Leonardo Gabriel',
                'ap_paterno' => 'Suarez',
                'ap_materno' => null,
                'alias' => null,
                'no_camiseta' => 32,
            ],
            [
                'nombre' => 'Salvador',
                'ap_paterno' => 'Reyes',
                'ap_materno' => 'Chavez',
                'alias' => null,
                'no_camiseta' => 26,
            ],
            [
                'nombre' => 'Paul Brian',
                'ap_paterno' => 'Rodriguez',
                'ap_materno' => 'Bravo',
                'alias' => 'rayo',
                'no_camiseta' => 7,
            ],
        ];

        foreach ($futbolistas as $futbolista) {
            Futbolista::create($futbolista);
        }
    }
}
