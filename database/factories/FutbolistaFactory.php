<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\futbolista>
 */
class FutbolistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'ap_paterno' => $this->faker->word,
            'ap_materno' => $this->faker->word,
            'alias' => $this->faker->word,
            'no_camiseta' => $this->faker->numberBetween(1, 100),
            'equipo_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
