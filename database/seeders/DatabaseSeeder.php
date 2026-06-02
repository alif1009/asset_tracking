<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // HAPUS ATAU KOMENTARI BAGIAN INI:
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // CUKUP PANGGIL SEEDER ADMIN SAJA
        $this->call([
            AdminSeeder::class,
        ]);
    }
}