<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeetingRequest;
use App\Models\User;
use Faker\Generator as Faker;

class MeetingRequestSeeder extends Seeder
{
    public function run(Faker $faker)
    {

        // Ambil user dengan role_id = 1 (misalnya)
        $user = User::where('id_role', 1)->first();

        if ($user) {
            // Tambahkan satu data manual dengan user_id yang diambil
            MeetingRequest::create([
                'user_id' => $user->id,
                'title' => 'asd',
                'description' => 'asd',
                'priority' => 'High',
                'status' => 'Diterima',
            ]);
        } else {
            // Handle jika tidak ada user dengan role_id = 1
            $this->command->info('User with role_id = 1 not found.');
        }

        MeetingRequest::factory()->count(5)->create();
    }
}
