<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@gmail.com'], // Cek apakah admin sudah ada
            [
                'name' => 'Gracie',
                'email' => 'test@gmail.com',
                'password' => Hash::make('123'), // Ganti dengan password yang aman
                'role' => 'user',
            ],
        );
    }
}
