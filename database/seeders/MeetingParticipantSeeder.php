<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class MeetingParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        
        // Ambil semua submission_modules dan users
        $submissionModules = DB::table('submission_modules')->pluck('id');
        $users = DB::table('users')->pluck('id');

        // Jumlah data yang ingin dimasukkan
        $numberOfParticipants = 15; // Misalnya ingin memasukkan 500 partisipan

        // Array untuk memantau participant_id yang sudah dipilih
        $chosenParticipants = [];

        // Loop untuk membuat data dummy
        for ($i = 0; $i < $numberOfParticipants; $i++) {
            // Ambil random agenda_id
            $agendaId = $submissionModules->random();

            // Ambil participant_id yang belum dipilih sebelumnya
            do {
                $participantId = $users->random();
            } while (in_array($participantId, $chosenParticipants));

            // Tandai participant_id ini sudah dipilih
            $chosenParticipants[] = $participantId;

            // Insert ke dalam tabel meeting_participants
            DB::table('meeting_participants')->insert([
                'id' => Str::uuid(),
                'agenda_id' => $agendaId,
                'participant_id' => $participantId,
                'confirmed_at' => $faker->datetime(),
                'initial_absen_at' => $faker->datetime(),
                'final_absen_at' => $faker->optional()->datetime(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
