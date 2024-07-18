<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(
            [
                [
                    'nama_role'  =>  'Direktur'
                ],
                [
                    'nama_role'  =>  'Manajer'
                ],
                [
                    'nama_role'  =>  'Supervisor'
                ],
                [
                    'nama_role'  =>  'Staf'
                ],
                [
                    'nama_role'  =>  'Pegawai'
                ],
            ]
        );
    }
}
