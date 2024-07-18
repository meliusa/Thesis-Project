<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed initial users
        $initialUsers = [
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 1,
                'nama' => 'Meliusa Nora Hariyanti',
                'email' => 'meliusanorahariyanti@gmail.com',
                'username' => 'direktur',
                'password' => Hash::make('direktur')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 2,
                'nama' => 'Ikhbar Ramadhan',
                'email' => 'ramadhanikhbar2012@gmail.com',
                'username' => 'manajerasd',
                'password' => Hash::make('manajerasd')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 3,
                'nama' => 'Ava Hernandez',
                'email' => 'ava.hernandez@example.com',
                'username' => 'supervisor',
                'password' => Hash::make('supervisor')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Liam Lopez',
                'email' => 'liam.lopez@example.com',
                'username' => 'stafasdasd',
                'password' => Hash::make('stafasdasd')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Olivia Young',
                'email' => 'olivia.young@example.com',
                'username' => 'oliviayoung',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Jessica Brown',
                'email' => 'jessica.brown@example.com',
                'username' => 'jessicabrown',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Daniel Johnson',
                'email' => 'daniel.johnson@example.com',
                'username' => 'danieljohnson',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'username' => 'emilydavis',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Christopher Martinez',
                'email' => 'christopher.martinez@example.com',
                'username' => 'christophermartinez',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Olivia Wilson',
                'email' => 'olivia.wilson@example.com',
                'username' => 'oliviawilson',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'James Anderson',
                'email' => 'james.anderson@example.com',
                'username' => 'jamesanderson',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Sophia Taylor',
                'email' => 'sophia.taylor@example.com',
                'username' => 'sophiataylor',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Alexander White',
                'email' => 'alexander.white@example.com',
                'username' => 'alexanderwhite',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'Isabella Brown',
                'email' => 'isabella.brown@example.com',
                'username' => 'isabellabrown',
                'password' => Hash::make('password')
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_role' => 4,
                'nama' => 'William Moore',
                'email' => 'william.moore@example.com',
                'username' => 'williammoore',
                'password' => Hash::make('password')
            ],
        ];

        // Additional random users
        // $additionalUsers = [];
        // for ($i = 0; $i < 100; $i++) {
        //     $additionalUsers[] = [
        //         'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        //         'id_role' => 4,
        //         'nama' => 'Random User ' . ($i + 1),
        //         'email' => 'user' . ($i + 1) . '@example.com',
        //         'username' => 'user' . ($i + 1),
        //         'password' => Hash::make('password') // Default password, you can change this
        //     ];
        // }

        // Combine initial users and additional users
        $usersToSeed = array_merge($initialUsers);

        // Insert into database
        DB::table('users')->insert($usersToSeed);
    }
}
