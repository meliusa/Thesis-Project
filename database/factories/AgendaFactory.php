<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Topic;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
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
            'topic_id' => Topic::inRandomOrder()->first()->id,
            'date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'time' => $this->faker->time(),
            'meeting_type' => $this->faker->randomElement(['Daring', 'Tatap Muka']),
            'meeting_address' => $this->faker->randomElement([
                $this->faker->address, // Alamat acak
                $this->faker->url // Link Zoom/GMeet acak
            ]), 
            'status' => $this->faker->randomElement(['Menunggu Persetujuan', 'Diterima', 'Ditolak','Dijadwalkan','Selesai','Notula Tersedia']),
            'rejection_reason' => $this->faker->optional()->paragraph,
            'distributed_at' => $this->faker->dateTime,
            'completed_at' => $this->faker->dateTime,
            'reported_at' => $this->faker->dateTime,
        ];
    }
}
