<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PollingDetail;
use App\Models\Presentation;
use Database\Seeders\DocMinuteSeeder as SeedersDocMinuteSeeder;
use DocMinuteSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            DivisionSeeder::class,
            JobPositionSeeder::class,
            JobTypeSeeder::class,
            AdminsTableSeeder::class,
            
            // TA
            SubmissionModuleSeeder::class,
            MeetingParticipantSeeder::class,
            SeedersDocMinuteSeeder::class,
            DocMinuteQnaDetailsSeeder::class,
            PollingSeeder::class,
            PollingDetailSeeder::class,
            
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
