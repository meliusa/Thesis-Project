<?php

namespace Database\Seeders;

use App\Models\MeetingRequest;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Ambil user dengan role_id = 1 (misalnya)
        $user = User::where('id_role', 2)->first();
        $meetingRequest = MeetingRequest::where('title', 'asd')->first();

        if ($user && $meetingRequest) {
            // Tambahkan satu data manual dengan user_id yang diambil
            Topic::create([
                'user_id' => $user->id,
                'request_id' => $meetingRequest->id,
                'title' => 'asd',
                'description' => 'asd',
                'supporting_file' => 'asd',
                'status' => 'Diterima',
            ]);
        } else {
            // Handle jika tidak ada user dengan role_id = 2
            $this->command->info('User with role_id = 2 not found.');
        }

        Topic::factory()->count(5)->create();
    }
}
