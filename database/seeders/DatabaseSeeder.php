<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menyisipkan data pengguna
        User::factory()->create([
            'name' => 'Adit',
            'email' => 'admin55@gmail.com',
            'password' => 'Hash'::make('5555'), 
        ]);

        // Memanggil seeder MusicSeeder
       // $this->call(MusicSeeder::class);

    
    }
}