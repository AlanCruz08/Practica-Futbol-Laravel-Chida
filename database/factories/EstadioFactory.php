<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\estadio>
 */
class EstadioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nombre" => $this->faker->word,
            "pais" => $this->faker->word,
            "capacidad" => $this->faker->numberBetween(1, 100000),
        ];
    }
}
