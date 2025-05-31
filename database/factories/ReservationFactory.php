<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'evenement_id' => Evenement::factory(),
            'date_reservation' => $this->faker->dateTimeBetween('-1 month', '+6 months'),
            'budget' => $this->faker->numberBetween(1000, 20000),
        ];
    }
}
