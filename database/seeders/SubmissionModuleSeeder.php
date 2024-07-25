<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubmissionModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data untuk user_id
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Data untuk title
        $titles = [
            'Rapat Evaluasi Kinerja Kuartalan',
            'Pertemuan Strategi Pengembangan Produk',
            'Diskusi Rencana Pemasaran Tahunan',
            'Presentasi Proyek Baru',
            'Rapat Koordinasi Tim Keuangan',
            'Forum Diskusi Keamanan Data',
            'Pertemuan Evaluasi Teknis',
            'Rapat Pencapaian KPI Bulanan',
            'Diskusi Implementasi Sistem Baru',
            'Pertemuan Tim Riset dan Pengembangan',
            'Workshop Inovasi Produk',
            'Rapat Perencanaan Anggaran',
            'Presentasi Hasil Penelitian',
            'Pertemuan Review Performa Tim',
            'Diskusi Pengembangan Bisnis',
            'Rapat Pembahasan Kebijakan Internal',
            'Forum Evaluasi Proyek IT',
            'Pertemuan Persiapan Acara Besar',
            'Rapat Evaluasi Vendor',
            'Presentasi Strategi Penjualan',
            'Diskusi Rencana Pengembangan Sumber Daya Manusia'
        ];

        // Data untuk agenda
        $agendas = [
            "1. Presentasi hasil terkini\n2. Diskusi tentang roadmap kedepan\n3. Perencanaan strategi pemasaran untuk kuartal mendatang\n4. Pengambilan keputusan terkait alokasi anggaran",
            "1. Evaluasi kinerja produk\n2. Diskusi strategi pengembangan\n3. Perencanaan langkah-langkah kedepan\n4. Peninjauan ulang rencana pemasaran",
            "1. Presentasi rencana pemasaran tahunan\n2. Diskusi strategi penjualan\n3. Evaluasi hasil kampanye\n4. Perencanaan promosi dan branding",
            "1. Presentasi proyek baru\n2. Diskusi teknis dan arsitektur\n3. Perencanaan fase implementasi\n4. Evaluasi risiko dan pengelolaan proyek",
            "1. Evaluasi laporan keuangan\n2. Diskusi tentang optimisasi keuangan\n3. Perencanaan strategi penghematan\n4. Peninjauan kebijakan keuangan",
            "1. Diskusi keamanan data terkini\n2. Presentasi risiko keamanan\n3. Evaluasi tindak lanjut\n4. Perencanaan tindakan keamanan",
            "1. Evaluasi teknis proyek\n2. Diskusi pengembangan teknologi\n3. Perencanaan fase uji coba\n4. Peninjauan arsitektur sistem",
            "1. Presentasi pencapaian KPI\n2. Diskusi strategi peningkatan\n3. Evaluasi rencana aksi\n4. Perencanaan langkah-langkah kedepan",
            "1. Diskusi implementasi sistem baru\n2. Presentasi roadmap sistem\n3. Evaluasi integrasi\n4. Perencanaan tahap rollout",
            "1. Diskusi rencana riset\n2. Presentasi hasil riset\n3. Evaluasi strategi pengembangan\n4. Perencanaan langkah-langkah penelitian",
            "1. Workshop inovasi produk\n2. Diskusi ide-ide baru\n3. Evaluasi konsep produk\n4. Perencanaan pengembangan produk",
            "1. Evaluasi anggaran departemen\n2. Presentasi laporan anggaran\n3. Diskusi alokasi anggaran\n4. Peninjauan kebijakan keuangan",
            "1. Presentasi hasil penelitian\n2. Diskusi temuan penelitian\n3. Evaluasi metodologi\n4. Perencanaan publikasi dan penyebaran",
            "1. Review performa tim\n2. Diskusi kinerja individu\n3. Evaluasi peningkatan performa\n4. Perencanaan pelatihan dan pengembangan",
            "1. Diskusi pengembangan bisnis\n2. Presentasi peluang bisnis\n3. Evaluasi strategi pasar\n4. Perencanaan pengembangan bisnis",
            "1. Pembahasan kebijakan internal\n2. Diskusi implementasi kebijakan\n3. Evaluasi dampak kebijakan\n4. Perencanaan komunikasi kebijakan",
            "1. Evaluasi proyek IT\n2. Diskusi implementasi teknologi\n3. Perencanaan fase pengembangan\n4. Peninjauan roadmap teknologi",
            "1. Persiapan acara besar\n2. Presentasi rencana acara\n3. Diskusi logistik acara\n4. Perencanaan promosi dan pelaksanaan",
            "1. Evaluasi vendor\n2. Diskusi kinerja vendor\n3. Perencanaan strategi vendor\n4. Peninjauan kontrak dan kerja sama",
            "1. Presentasi strategi penjualan\n2. Diskusi strategi pemasaran\n3. Evaluasi target penjualan\n4. Perencanaan promosi penjualan",
            "1. Diskusi rencana pengembangan SDM\n2. Presentasi program pengembangan\n3. Evaluasi kebutuhan SDM\n4. Perencanaan pengembangan karyawan"
        ];

        // Data untuk purpose
        $purposes = [
            'Tujuan rapat ini adalah untuk membahas strategi pemasaran baru.',
            'Rapat ini bertujuan untuk mengevaluasi hasil proyek terbaru.',
            'Diskusi strategis untuk meningkatkan performa tim keuangan.',
            'Evaluasi teknis mengenai implementasi sistem baru.',
            'Pertemuan untuk merencanakan pengembangan produk baru.',
            'Diskusi penting terkait kebijakan internal perusahaan.',
            'Presentasi hasil riset terkini dan diskusi temuan.',
            'Forum evaluasi proyek IT dan roadmap teknologi.',
            'Pertemuan untuk mengevaluasi kinerja vendor terkini.',
            'Diskusi tentang pengembangan SDM dan program pelatihan.',
            'Rapat koordinasi untuk merencanakan acara besar.',
            'Pertemuan strategis untuk diskusi rencana anggaran.',
            'Evaluasi strategi penjualan dan promosi produk.',
            'Presentasi laporan keuangan dan evaluasi hasil kampanye.',
            'Diskusi mengenai keamanan data dan tindak lanjut.',
            'Pertemuan untuk merancang rencana pemasaran tahunan.',
            'Presentasi roadmap sistem baru dan evaluasi integrasi.',
            'Forum diskusi keamanan data terbaru dan risiko.',
            'Rapat untuk merancang strategi peningkatan KPI.',
            'Evaluasi hasil riset dan presentasi publikasi.',
            'Pertemuan untuk merencanakan pengembangan bisnis baru.'
        ];

        // Data untuk status
        $statuses = [
            'Baru Ditambahkan',
            'Proses Persetujuan',
            'Sudah Disetujui',
            'Undangan Didistribusikan',
            'Telah Dilaksanakan',
            'Dibatalkan',
            'Notula Tersedia'
        ];

        // Inisialisasi array untuk menyimpan data rapat
        $meetings = [];

        // Generate 20 data dummy
        for ($i = 0; $i < 20; $i++) {
            $status = $statuses[array_rand($statuses)];
            $reasonCancelled = '';
            if ($status == 'Dibatalkan' || $status == 'Tidak Disetujui') {
                // Generate random reason for cancellation
                $reasons = [
                    'Ada keadaan darurat yang mendesak.',
                    'Perubahan jadwal yang tidak dapat dihindari.',
                    'Kondisi cuaca yang memburuk.',
                    'Kesalahan administrasi dalam perencanaan.',
                    'Ketidaksediaan peserta kunci dalam rapat.',
                    'Perubahan strategis yang mendadak.',
                    'Kesalahan komunikasi dalam persiapan.',
                    'Ketidaksesuaian lokasi atau fasilitas.',
                    'Permasalahan teknis yang tidak terduga.'
                ];
                $reasonCancelled = $reasons[array_rand($reasons)];
            }

            $postscript = [
                'Notula rapat akan segera didistribusikan kepada peserta.',
                    'Mohon untuk meninjau kembali hasil rapat untuk diskusi lebih lanjut.',
                    'Apabila ada yang perlu ditambahkan, silakan berikan masukan.',
                    'Kami berterima kasih atas partisipasi aktif dari seluruh peserta rapat.'
            ]; 

            $meeting = [
                'id' => \Faker\Provider\Uuid::uuid(),
                'user_id' => $userIds[array_rand($userIds)], // Ambil secara acak dari user IDs yang tersedia
                'title' => $titles[array_rand($titles)], // Ambil secara acak dari judul yang tersedia
                'purpose' => $purposes[array_rand($purposes)], // Ambil secara acak dari tujuan yang tersedia
                'agenda' => $agendas[array_rand($agendas)], // Ambil secara acak dari agenda yang tersedia
                'date' => date('Y-m-d', strtotime("+{$i} days")), // Tanggal dari hari ini ditambah $i hari
                'time' => '09:00:00',
                'duration' => '2 jam',
                'type' => $i % 2 == 0 ? 'Tatap Muka' : 'Daring', // Bergantian antara Tatap Muka dan Daring
                'location' => 'Gedung Utama',
                'supporting_document' => 'Dokumen pendukung belum tersedia.',
                'postscript' => $postscript[array_rand($postscript)],
                'status' => $status, // Ambil secara acak dari status yang tersedia
                'reason_cancelled' => $reasonCancelled, // Tambahkan alasan jika statusnya Dibatalkan atau Tidak Disetujui
                'approved_at' => date('Y-m-d H:i:s', strtotime("+{$i} days +1 hour")), // Disetujui 1 jam setelah dibuat
                'distributed_at' => date('Y-m-d H:i:s', strtotime("+{$i} days +2 hours")), // Didistribusikan 2 jam setelah disetujui
                'implemented_at' => date('Y-m-d H:i:s', strtotime("+{$i} days +4 hours")), // Diimplementasikan 4 jam setelah disetujui
                'provided_at' => date('Y-m-d H:i:s', strtotime("+{$i} days +3 hours")), // Persiapan 3 jam sebelum implementasi
                'created_at' => now(), // Waktu pembuatan saat ini
                'updated_at' => Carbon::now()->subDays(rand(1, 30))->subMinutes(rand(1, 1440)), // Waktu pembaruan secara random antara 1 hari - 30 hari yang lalu
            ];

            $meetings[] = $meeting;
        }

        // Tambahkan 1 data statis dengan tanggal hari ini
        $status = $statuses[array_rand($statuses)];
        $reasonCancelled = '';
        if ($status == 'Dibatalkan' || $status == 'Tidak Disetujui') {
            // Generate random reason for cancellation
            $reasons = [
                'Ada keadaan darurat yang mendesak.',
                'Perubahan jadwal yang tidak dapat dihindari.',
                'Kondisi cuaca yang memburuk.',
                'Kesalahan administrasi dalam perencanaan.',
                'Ketidaksediaan peserta kunci dalam rapat.',
                'Perubahan strategis yang mendadak.',
                'Kesalahan komunikasi dalam persiapan.',
                'Ketidaksesuaian lokasi atau fasilitas.',
                'Permasalahan teknis yang tidak terduga.'
            ];
            $reasonCancelled = $reasons[array_rand($reasons)];
        }

        $meetingToday = [
            'id' => \Faker\Provider\Uuid::uuid(),
            'user_id' => $userIds[array_rand($userIds)], // Ambil secara acak dari user IDs yang tersedia
            'title' => $titles[array_rand($titles)], // Ambil secara acak dari judul yang tersedia
            'purpose' => $purposes[array_rand($purposes)], // Ambil secara acak dari tujuan yang tersedia
            'agenda' => $agendas[array_rand($agendas)], // Ambil secara acak dari agenda yang tersedia
            'date' => now(),
            'time' => '09:00:00',
            'duration' => '2 jam',
            'type' => 'Tatap Muka', // Contoh type diset ke Tatap Muka
            'location' => 'Gedung Utama',
            'supporting_document' => 'Dokumen pendukung belum tersedia.',
            'postscript' => $postscript[array_rand($postscript)],
            'status' => 'Undangan Didistribusikan',
            'reason_cancelled' => $reasonCancelled, // Tambahkan alasan jika statusnya Dibatalkan atau Tidak Disetujui
            'approved_at' => date('Y-m-d H:i:s', strtotime('+1 hour')), // Disetujui 1 jam setelah dibuat
            'distributed_at' => date('Y-m-d H:i:s', strtotime('+2 hours')), // Didistribusikan 2 jam setelah disetujui
            'implemented_at' => date('Y-m-d H:i:s', strtotime('+4 hours')), // Diimplementasikan 4 jam setelah disetujui
            'provided_at' => date('Y-m-d H:i:s', strtotime('+3 hours')), // Persiapan 3 jam sebelum implementasi
            'created_at' => now(), // Waktu pembuatan saat ini
            'updated_at' => Carbon::now()->subDays(rand(1, 30))->subMinutes(rand(1, 1440)), // Waktu pembaruan secara random antara 1 hari - 30 hari yang lalu
        ];

        $meetings[] = $meetingToday;

        // Masukkan data ke dalam tabel submissions (sesuaikan nama tabel jika berbeda)
        DB::table('submission_modules')->insert($meetings);
    }
}
