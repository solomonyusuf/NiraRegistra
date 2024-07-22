<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'first_name' => 'Solomon',
            'last_name' => 'Yusuf',
            'email' => 'admin@nira.org.ng',
            'password' => bcrypt('12345'),
        ]);
    }
}
