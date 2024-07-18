<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocMinuteDecisionDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil semua doc_minutes yang tersedia
        $docMinutes = DB::table('doc_minutes')->pluck('id')->toArray();

        // Data keputusan rapat
        $decisions = [
            'Menerima usulan',
            'Menolak usulan',
            'Menunda keputusan',
            'Menyetujui dengan revisi',
            'Menyimpan untuk perdebatan lanjutan',
            'Menyerahkan kepada komite lain',
            'Membatalkan rapat',
            'Mengadakan pemungutan suara',
            'Membuat rekomendasi',
            'Menetapkan kebijakan baru',
        ];

        // Buat data dummy untuk doc_minute_decision_details
        $docMinuteDecisionDetails = [];

        foreach ($docMinutes as $docMinuteId) {
            // Ambil 3 keputusan random untuk setiap doc_minute
            $selectedDecisions = [];
            $selectedIndexes = array_rand($decisions, 3);

            foreach ($selectedIndexes as $index) {
                $selectedDecisions[] = $decisions[$index];
            }

            foreach ($selectedDecisions as $decision) {
                $docMinuteDecisionDetails[] = [
                    'doc_minute_id' => $docMinuteId,
                    'decision' => $decision,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan data menggunakan DB facade
        DB::table('doc_minute_decision_details')->insert($docMinuteDecisionDetails);
    }
}
