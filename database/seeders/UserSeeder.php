<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Static dummy data
        $staticUsers = [
            [
                'id' => Str::uuid()->toString(),
                'id_role' => 1,
                'nama' => 'Meliusa Nora Hariyanti',
                'email' => 'meliusanorahariyanti@gmail.com',
                'username' => 'direktur',
                'password' => Hash::make('direktur'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid()->toString(),
                'id_role' => 2,
                'nama' => 'Ikhbar Ramadhan',
                'email' => 'ramadhanikhbar2012@gmail.com',
                'username' => 'manajerasd',
                'password' => Hash::make('manajerasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid()->toString(),
                'id_role' => 3,
                'nama' => 'Rama',
                'email' => 'sayangilolimu@gmail.com',
                'username' => 'supervisor',
                'password' => Hash::make('supervisor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid()->toString(),
                'id_role' => 4,
                'nama' => 'Caca',
                'email' => '2041720084@student.polinema.ac.id',
                'username' => 'stafasdasd',
                'password' => Hash::make('stafasdasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Generate additional dynamic users
        $numberOfDynamicUsers = 50; 
        $dynamicUsers = [];
        for ($i = 0; $i < $numberOfDynamicUsers; $i++) {
            $dynamicUsers[] = [
                'id' => Str::uuid()->toString(),
                'id_role' => rand(1, 5), // Assuming roles exist with IDs from 1 to 5
                'nama' => 'User ' . ($i + 1),
                'email' => 'user' . ($i + 1) . '@example.com',
                'username' => 'user' . ($i + 1),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Combine static and dynamic users and insert into database
        $allUsers = array_merge($staticUsers, $dynamicUsers);
        DB::table('users')->insert($allUsers);
    }
}
