<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocMinuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil semua submission_modules yang memiliki status 'Telah Dilaksanakan'
        $agendaIds = DB::table('submission_modules')
                        ->where('status', 'Telah Dilaksanakan')
                        ->pluck('id')
                        ->toArray();

        // Data events dan decisions untuk setiap entri
        $data = [];

        foreach ($agendaIds as $agendaId) {
            $data[] = [
                'id' => Str::uuid(),
                'agenda_id' => $agendaId,
                'user_id' => $this->getRandomUserId(),
                'events' => $this->generateEvents(),
                'decisions' => $this->generateDecisions(),
                'status' => $this->generateStatus(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Masukkan data ke dalam tabel
        DB::table('doc_minutes')->insert($data);
    }

    private function getRandomUserId()
    {
        // Ambil user_id dari tabel users secara acak
        return DB::table('users')->inRandomOrder()->value('id');
    }

    private function generateEvents()
    {
        // Generate events dengan variasi yang berbeda
        $events = [
            "1. Pembukaan rapat\n2. Penyampaian agenda\n3. Diskusi terkait setiap agenda",
            "1. Pembukaan rapat\n2. Presentasi hasil proyek A\n3. Diskusi dan saran",
            "1. Pembukaan rapat\n2. Evaluasi kinerja bulan lalu\n3. Diskusi perbaikan kinerja",
            "1. Pembukaan rapat\n2. Presentasi strategi pemasaran baru\n3. Diskusi dan revisi strategi",
            "1. Pembukaan rapat\n2. Penilaian kinerja tim proyek A\n3. Diskusi dan perbaikan langkah-langkah",
        ];

        return $events[array_rand($events)];
    }

    private function generateDecisions()
    {
        // Generate decisions dengan variasi yang berbeda
        $decisions = [
            "1. Menyetujui Rencana X\n2. Menunda Keputusan Y hingga rapat berikutnya",
            "1. Menyetujui anggaran proyek A\n2. Mengajukan revisi pada bagian B",
            "1. Menyetujui peningkatan KPI\n2. Mengajukan pelatihan untuk staf",
            "1. Menyetujui alokasi anggaran untuk kampanye\n2. Menunda peluncuran produk hingga Q4",
            "1. Menyetujui bonus untuk tim proyek A\n2. Merevisi jadwal proyek untuk mempercepat peluncuran",
        ];

        return $decisions[array_rand($decisions)];
    }

    private function generateStatus()
    {
        // Generate status dengan variasi yang berbeda
        $statuses = ['Baru Ditambahkan', 'Telah Didistribusikan'];

        return $statuses[array_rand($statuses)];
    }
}
