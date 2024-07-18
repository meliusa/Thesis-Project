<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presentation>
 */
class MaterialFactory extends Factory
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
            'user_id' => User::inRandomOrder()->first()->id,
            'agenda_id' => Agenda::inRandomOrder()->first()->id,
            'file_link' => $this->faker->url,
            'status' => $this->faker->randomElement(['Menunggu Review', 'Disetujui', 'Ditolak']),
            'rejection_reason' => $this->faker->optional()->text,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
