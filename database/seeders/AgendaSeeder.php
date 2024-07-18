<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agenda;
use App\Models\MeetingRequest;
use App\Models\Topic;
use App\Models\User;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Ambil user dengan role_id = 1 (misalnya)
        $user = User::where('id_role', 2)->first();
        $topic = Topic::where('title', 'asd')->first();

        if ($user && $topic) {
             // Tambahkan satu data manual dengan user_id yang diambil
            Agenda::create([
                'user_id' => $user->id,
                'topic_id' => $topic->id,
                'date' => '2024-06-28',
                'time' => '06:58:00',
                'meeting_type' => 'Daring',
                'meeting_address' => 'asd',
                'status' => 'Dijadwalkan',
        ]);
        } else {
             // Handle jika tidak ada user dengan role_id = 2
            $this->command->info('User with role_id = 2 not found.');
        }
        
        Agenda::factory()->count(5)->create();
    }
}
