<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Polling;

class VoteSeeder extends Seeder
{
    public function run()
    {
        // Ambil 20 user secara acak
        $users = User::inRandomOrder()->limit(20)->get();

        // Ambil 20 polling secara acak
        $polls = Polling::inRandomOrder()->limit(20)->get();

        // Array untuk menyimpan data vote
        $votes = [];

        // Loop untuk membuat data vote
        foreach ($users as $user) {
            foreach ($polls as $poll) {
                $votes[] = [
                    'user_id' => $user->id,
                    'poll_id' => $poll->id,
                    'poll_detail_id' => $this->getPollDetailId(), // Isi dengan id polling detail yang diinginkan
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data menggunakan DB facade
        DB::table('voters')->insert($votes);
    }

    // Metode untuk mendapatkan poll_detail_id secara acak atau sesuai kebutuhan aplikasi Anda
    private function getPollDetailId()
    {
        // Misalnya, ambil id polling detail pertama
        return DB::table('polling_details')->value('id');
    }
}
