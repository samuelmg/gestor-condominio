<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Condominio>
 */
class CondominioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $municipio = Municipio::find($this->faker->numberBetween(1, 2463));

        return [
            'condominio' => $this->faker->words(4, true),
            'pais_id' => 150,
            'estado_id' => $municipio->estado_id,
            'municipio_id' => $municipio->id,
            'localidad' => $this->faker->city(),
            'colonia' => $this->faker->word(),
            'calle' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
        ];
    }
}
