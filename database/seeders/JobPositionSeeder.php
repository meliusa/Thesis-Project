<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $division = DB::table('divisions')->where('nama_divisi', 'Produksi')->first();
        $divisionId = $division->id;

        DB::table('job_positions')->insert(
            [
                [
                    'id' => '1d09f1ef-565b-4a7f-8de3-4fce5ebc2192',
                    'id_divisi' => $divisionId,
                    'nama_posisi' => 'Helper'
                ],
                [
                    'id' => '3c7838bc-6483-4290-9a1e-fd9c6cacccc3',
                    'id_divisi' => $divisionId,
                    'nama_posisi' => 'Operator'
                ]
            ]
        );
    }
}
