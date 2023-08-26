<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Dep;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
            'prenom' => 'Rijale',
            'nom' => 'Fall',
            'login' => 'R_Fall',
            'email' => 'rijaloulaye@gmail.com',
            'profil' => 'admin',
            'status' => 1,
            'telephone' => '77 100 10 10',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
         ]);
        
    }
}
