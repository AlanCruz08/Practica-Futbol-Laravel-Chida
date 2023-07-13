<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisiones = [
            [
                'nivel' => 1,
                'liga' => 'Liga MX',
            ],
            [
                'nivel' => 2,
                'liga' => 'Liga de Expansion MX',
            ],
            [
                'nivel' => 3,
                'liga' => 'Liga Premier',
            ],
            [
                'nivel' => 4,
                'liga' => 'Liga TDP',
            ],
            [
                'nivel' => 5,
                'liga' => 'Sector Amateur Varonil',
            ],
        ];

        foreach ($divisiones as $division) {
            Division::create($division);
        }
    }
}
