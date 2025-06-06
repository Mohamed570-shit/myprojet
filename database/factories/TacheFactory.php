<?php

namespace Database\Factories;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evenement_id' => Evenement::factory(),
            'description' => $this->faker->sentence,
            'statut' => $this->faker->boolean,
        ];
    }
}
