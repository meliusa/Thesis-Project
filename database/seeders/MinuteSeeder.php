<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MinuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Retrieve existing UUIDs from users, agendas, and presences tables
        $userIds = DB::table('users')->pluck('id')->toArray();
        $agendaIds = DB::table('agendas')->pluck('id')->toArray();

        // Generate sample data and insert into the minutes table
        for ($i = 0; $i < 5; $i++) {
            DB::table('minutes')->insert([
                'id' => Str::uuid(),
                'user_id' => $faker->randomElement($userIds),
                'agenda_id' => $faker->randomElement($agendaIds),
                'series_of_event' => $faker->paragraph,
                'decision' => $faker->paragraph,
                'q_n_a' => $faker->paragraph,
                'status' => $faker->randomElement(['Menunggu Persetujuan', 'Diterima', 'Ditolak']),
                'rejection_reason' => $faker->optional()->paragraph,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
