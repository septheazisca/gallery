<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'nature.jpg',
            'judul_kategori' => 'Nature',
            'deskripsi_kategori' => 'Beautiful landscapes and wildlife.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
