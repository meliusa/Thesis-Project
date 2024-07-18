<?php

namespace Database\Factories;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Polling>
 */
class PollingFactory extends Factory
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
            'question' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['Baru Ditambahkan', 'Proses', 'Selesai']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
