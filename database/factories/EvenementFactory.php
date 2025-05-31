<?php

namespace Database\Factories;

use App\Models\Prestataire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->sentence(3),
            'type' => $this->faker->randomElement(['Mariage', 'Anniversaire', 'Séminaire']),
            'lieu' => $this->faker->city,
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'prestataire_id' => Prestataire::factory(),
        ];
    }
}
