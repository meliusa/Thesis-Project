<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            [
                'id' => 'bd63ccd1-7e31-42c8-bd5b-783bca160ad8',
                'nama_divisi' => 'Produksi'
            ]
        ]);
    }
}
