<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vivienda>
 */
class ViviendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->numberBetween(1, 100),
            'estatus' => 'Habitada',
            'notas' => $this->faker->sentence(),
        ];
    }
}
