<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MeetingParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua agenda_id dari submission_modules
        $agendaIds = DB::table('submission_modules')->pluck('id')->toArray();

        // Ambil semua participant_id dari users
        $participantIds = DB::table('users')->pluck('id')->toArray();

        // Array untuk menampung data partisipan
        $participants = [];

        // Loop untuk setiap agenda_id
        foreach ($agendaIds as $agendaId) {
            // Tentukan jumlah partisipan acak antara 1 hingga 5
            $numParticipants = rand(1, 50);

            // Pilih secara acak participant_id
            $selectedParticipants = array_rand(array_flip($participantIds), $numParticipants);

            // Loop untuk setiap participant yang dipilih
            foreach ((array) $selectedParticipants as $participantId) {
                // Tetapkan apakah participant mengkonfirmasi kehadiran
                $confirmedAt = rand(0, 1) ? now()->subHours(rand(1, 24)) : null;

                // Tetapkan apakah participant awalnya tidak hadir
                $initialAbsenAt = rand(0, 1) ? now()->subHours(rand(1, 24)) : null;

                // Tetapkan apakah participant akhirnya tidak hadir
                $finalAbsenAt = $initialAbsenAt && rand(0, 1) ? now()->subHours(rand(1, 24)) : null;

                // Alasan tidak hadir (jika finalAbsenAt terisi)
                $notAttendingReason = $finalAbsenAt ? $this->getRandomAbsenceReason() : null;

                // Data partisipan
                $participants[] = [
                    'id' => Str::uuid()->toString(),
                    'agenda_id' => $agendaId,
                    'participant_id' => $participantId,
                    'confirmed_at' => $confirmedAt,
                    'initial_absen_at' => $initialAbsenAt,
                    'final_absen_at' => $finalAbsenAt,
                    'not_attending_reason' => $notAttendingReason,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan data partisipan ke dalam tabel meeting_participants
        DB::table('meeting_participants')->insert($participants);
    }

    /**
     * Mendapatkan alasan tidak hadir secara acak.
     *
     * @return string
     */
    private function getRandomAbsenceReason()
    {
        $reasons = [
            'Ada keadaan darurat yang mendesak.',
            'Perubahan jadwal yang tidak dapat dihindari.',
            'Kondisi cuaca yang memburuk.',
            'Kesalahan administrasi dalam perencanaan.',
            'Ketidaksediaan peserta kunci dalam rapat.',
            'Perubahan strategis yang mendadak.',
            'Kesalahan komunikasi dalam persiapan.',
            'Ketidaksesuaian lokasi atau fasilitas.',
            'Permasalahan teknis yang tidak terduga.',
        ];

        return $reasons[array_rand($reasons)];
    }
}
