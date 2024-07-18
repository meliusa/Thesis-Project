<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocMinuteQnaDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil semua doc_minutes yang tersedia
        $docMinutes = DB::table('doc_minutes')->pluck('id')->toArray();

        // Data penanya, pertanyaan, dan jawaban
        $askers = [
            'John Doe',
            'Jane Smith',
            'Michael Johnson',
            'Emily Brown',
            'David Lee',
            'Sarah Wilson',
            'Robert Davis',
            'Olivia Taylor',
            'Daniel Clark',
            'Sophia Martinez',
        ];

        $questions = [
            'Bagaimana perkembangan proyek terbaru?',
            'Apakah ada masalah yang perlu segera diselesaikan?',
            'Bagaimana strategi untuk meningkatkan kinerja?',
            'Apa rencana ke depan untuk produk ini?',
            'Siapa yang bertanggung jawab untuk tahap selanjutnya?',
            'Apakah ada pertimbangan hukum yang perlu diperhatikan?',
            'Bagaimana pendapat tim terkait perubahan ini?',
        ];

        $answers = [
            'Proyek berjalan sesuai rencana dan telah mencapai milestone penting.',
            'Ada beberapa masalah teknis yang sedang kami hadapi, tetapi tim sudah menyiapkan solusi.',
            'Kami akan mengimplementasikan strategi baru untuk meningkatkan efisiensi dan efektivitas.',
            'Rencana ke depan termasuk peluncuran fitur baru dan kampanye pemasaran yang lebih agresif.',
            'Tim pengembang akan bertanggung jawab atas tahap selanjutnya dengan dukungan dari tim pemasaran.',
            'Pertimbangan hukum sudah kami konsultasikan dengan tim legal dan tidak ada hambatan.',
            'Tim sangat antusias dengan perubahan ini dan memiliki masukan positif.',
        ];

        // Buat data dummy untuk doc_minute_qna_details
        $docMinuteQnaDetails = [];

        foreach ($docMinutes as $docMinuteId) {
            // Acak urutan penanya untuk variasi
            shuffle($askers);

            // Ambil 3 penanya pertama untuk setiap doc_minute
            $selectedAskers = array_slice($askers, 0, 3);

            // Ambil 3 pertanyaan random untuk setiap doc_minute
            shuffle($questions);
            $selectedQuestions = array_slice($questions, 0, 3);

            // Ambil 3 jawaban random untuk setiap doc_minute
            shuffle($answers);
            $selectedAnswers = array_slice($answers, 0, 3);

            foreach ($selectedAskers as $index => $asker) {
                $docMinuteQnaDetails[] = [
                    'doc_minute_id' => $docMinuteId,
                    'asker' => $asker,
                    'question' => $selectedQuestions[$index],
                    'answer' => $selectedAnswers[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan data menggunakan DB facade
        DB::table('doc_minute_qna_details')->insert($docMinuteQnaDetails);
    }
}
