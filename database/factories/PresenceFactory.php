<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presence>
 */
class PresenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'agenda_id' => Agenda::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'confirmed_at' => $this->faker->dateTime(),
            'initial_absen_at' => $this->faker->dateTime(),
            'final_absen_at' => $this->faker->dateTime(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
