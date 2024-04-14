<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admingallery1975@gmail.com',
            'password' => Hash::make('admin123'),
            'email' => 'admingallery1975@gmail.com',
            'nama_lengkap' => 'Admin Gllery',
            'alamat' => 'Alamat Admin Gllery',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'septhea',
            'password' => Hash::make('123'),
            'email' => 'septhea@gmail.com',
            'nama_lengkap' => 'septhea zisca',
            'alamat' => 'jl. mawar',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
