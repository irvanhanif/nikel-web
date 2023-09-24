<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => "Admin",
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'ADMIN',
            'jabatan' => 'IT'
        ]);
        User::insert([
            'name' => "Pengguna",
            'email' => 'pengguna@gmail.com',
            'password' => Hash::make('password123')
        ]);
    }
}
