<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PollingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil semua submission_modules dengan status "Undangan Didistribusikan"
        $submissionModules = DB::table('submission_modules')
                             ->where('status', 'Undangan Didistribusikan')
                             ->pluck('id')
                             ->toArray();

        // Data pertanyaan untuk polling
        $questions = [
            'Apakah Anda setuju dengan rencana yang diajukan?',
            'Bagaimana pendapat Anda tentang implementasi program ini?',
            'Apakah Anda merasa informasi yang disampaikan sudah memadai?',
            'Bagaimana tingkat kepuasan Anda terhadap pelayanan yang diberikan?',
            'Haruskah kita melanjutkan proyek ini ke tahap berikutnya?',
            'Apakah Anda memiliki saran untuk perbaikan?',
        ];

        // Data status untuk polling
        $statuses = [
            'Baru Ditambahkan',
            'Proses',
            'Selesai',
        ];

        // Buat data dummy untuk pollings
        $pollings = [];

        foreach ($submissionModules as $agendaId) {
            $question = $questions[array_rand($questions)]; // Pilih pertanyaan secara acak
            $status = $statuses[array_rand($statuses)]; // Pilih status secara acak

            $pollings[] = [
                'id' => Str::uuid(),
                'agenda_id' => $agendaId,
                'question' => $question,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Masukkan data menggunakan DB facade
        DB::table('pollings')->insert($pollings);
    }
}
