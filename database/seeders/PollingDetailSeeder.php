<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PollingDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua pollings yang tersedia
        $pollings = DB::table('pollings')->pluck('id')->toArray();

        // Data opsi jawaban untuk polling
        $options = [
            'Setuju',
            'Tidak Setuju',
            'Netral',
            'Sangat Baik',
            'Buruk',
            'Memerlukan Klarifikasi Tambahan',
            'Perlu Diskusi Lebih Lanjut',
            'Tidak Tahu',
            'Tidak Berlaku',
        ];

        // Buat data dummy untuk polling_details
        $pollingDetails = [];

        foreach ($pollings as $pollId) {
            // Ambil 5 opsi jawaban random untuk setiap polling
            shuffle($options);
            $selectedOptions = array_slice($options, 0, 5);

            foreach ($selectedOptions as $option) {
                $pollingDetails[] = [
                    'id' => Str::uuid(),
                    'poll_id' => $pollId,
                    'option' => $option,
                    'votes' => 0, // Default votes set to 0
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan data menggunakan DB facade
        DB::table('polling_details')->insert($pollingDetails);
    }
}
