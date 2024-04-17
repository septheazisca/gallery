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

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'perempuan.jpg',
            'judul_kategori' => 'Perempuan',
            'deskripsi_kategori' => 'Menampilkan keindahan, kekuatan, dan keragaman perempuan dalam segala aspek kehidupan. Dari momen-momen yang memukau hingga potret inspiratif, kategori ini merayakan esensi dan peran yang dimainkan oleh perempuan di dunia ini. Dari keanggunan dalam gaya hingga keberanian dalam tindakan, setiap gambar menggambarkan kekuatan dan keunikan perempuan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'anak-anak.jpg',
            'judul_kategori' => 'Anak-anak',
            'deskripsi_kategori' => 'Menampilkan keceriaan, kreativitas, dan petualangan dunia anak-anak. Dari senyum cerah hingga kepolosan dalam tindakan, kategori ini merayakan kegembiraan dan kepolosan masa kanak-kanak. Setiap gambar menangkap momen-momen berharga dan penuh keajaiban dalam perjalanan pertumbuhan dan eksplorasi anak-anak.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'hewan.jpg',
            'judul_kategori' => 'hewan',
            'deskripsi_kategori' => 'Menampilkan keindahan alam dan kehidupan hewan dari seluruh penjuru dunia. Dari binatang-binatang liar yang megah hingga makhluk-makhluk kecil yang menggemaskan, kategori ini mempersembahkan keajaiban dan keragaman dunia hewan. Setiap gambar menangkap keunikan, keindahan, dan kehidupan yang menginspirasi dari kerajaan hewan.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'life-style.jpg',
            'judul_kategori' => 'Life Stayl',
            'deskripsi_kategori' => 'Menampilkan gaya hidup modern, tren, dan kebiasaan sehari-hari yang memengaruhi cara kita hidup. Dari gaya hidup aktif dan sehat hingga inspirasi dalam seni, fashion, dan kesejahteraan, kategori ini memperlihatkan beragam aspek kehidupan yang mempengaruhi pilihan dan preferensi kita. Setiap gambar menggambarkan keberagaman gaya hidup dan menginspirasi untuk menjalani kehidupan yang memenuhi cita-cita dan keinginan kita.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'makanan.jpg',
            'judul_kategori' => 'Makanan',
            'deskripsi_kategori' => 'Menampilkan kelezatan dan keanekaragaman kuliner dari berbagai belahan dunia. Dari hidangan-hidangan tradisional yang memikat hingga kreasi-kreasi modern yang menggugah selera, kategori ini mengundang Anda untuk menjelajahi dunia rasa melalui gambar-gambar menggugah selera. Setiap gambar menampilkan detail dan presentasi yang menawan, memperlihatkan keindahan dan kelezatan dari berbagai jenis makanan..',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
