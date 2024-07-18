<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocMinuteEventDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil semua doc_minutes yang tersedia
        $docMinutes = DB::table('doc_minutes')->pluck('id')->toArray();

        // Data acara rapat
        $events = [
            'Pembukaan Rapat',
            'Penyampaian Agenda',
            'Diskusi Poin Pertama',
            'Diskusi Poin Kedua',
            'Penetapan Keputusan',
            'Penutupan Rapat',
            'Istirahat',
            'Pengumuman',
            'Evaluasi Rapat',
            'Pemilihan Ketua Rapat',
            'Peninjauan Tindak Lanjut',
            'Pemberian Apresiasi',
            'Saran dan Kritik',
            'Penandatanganan Dokumen',
        ];

        // Buat data dummy untuk doc_minute_event_details
        $docMinuteEventDetails = [];

        foreach ($docMinutes as $docMinuteId) {
            // Acak urutan acara untuk variasi
            shuffle($events);

            // Ambil 5 acara pertama untuk setiap doc_minute
            $selectedEvents = array_slice($events, 0, 5);

            foreach ($selectedEvents as $index => $event) {
                $docMinuteEventDetails[] = [
                    'doc_minute_id' => $docMinuteId,
                    'event' => $event,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan data menggunakan DB facade
        DB::table('doc_minute_event_details')->insert($docMinuteEventDetails);
    }
}
