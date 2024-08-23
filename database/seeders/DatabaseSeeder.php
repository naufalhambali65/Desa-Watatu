<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@watatu.desa.id',
                'password' => bcrypt('password123')
            ],
        );
        User::create(
            [
                'name' => 'admin2',
                'email' => 'admin2@watatu.desa.id',
                'password' => bcrypt('password321')
            ],
        );
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
