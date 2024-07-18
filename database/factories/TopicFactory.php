<?php

namespace Database\Factories;

use App\Models\MeetingRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
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
            'request_id' => MeetingRequest::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'supporting_file' => $this->faker->url(),
            'status' => $this->faker->randomElement(['Menunggu Persetujuan', 'Diterima', 'Ditolak']),
            'rejection_reason' => $this->faker->boolean ? $this->faker->sentence : null,
        ];
    }
}
