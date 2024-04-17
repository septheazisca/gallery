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
            'judul_kategori' => 'Life Stayle',
            'deskripsi_kategori' => 'Menampilkan gaya hidup modern, tren, dan kebiasaan sehari-hari yang memengaruhi cara kita hidup. Dari gaya hidup aktif dan sehat hingga inspirasi dalam seni, fashion, dan kesejahteraan, kategori ini memperlihatkan beragam aspek kehidupan yang mempengaruhi pilihan dan preferensi kita. Setiap gambar menggambarkan keberagaman gaya hidup dan menginspirasi untuk menjalani kehidupan yang memenuhi cita-cita dan keinginan kita.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'makanan.jpg',
            'judul_kategori' => 'Makanan',
            'deskripsi_kategori' => 'Menampilkan kelezatan dan keanekaragaman kuliner dari berbagai belahan dunia. Dari hidangan-hidangan tradisional yang memikat hingga kreasi-kreasi modern yang menggugah selera, kategori ini mengundang Anda untuk menjelajahi dunia rasa melalui gambar-gambar menggugah selera. Setiap gambar menampilkan detail dan presentasi yang menawan, memperlihatkan keindahan dan kelezatan dari berbagai jenis makanan.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'couple.jpg',
            'judul_kategori' => 'Couple',
            'deskripsi_kategori' => 'Menampilkan kemesraan, kedekatan, dan kebahagiaan dalam hubungan pasangan. Dari momen-momen romantis hingga keintiman yang menghangatkan hati, kategori ini merayakan hubungan cinta antara dua orang yang saling mendukung dan memperkuat satu sama lain. Setiap gambar menangkap keindahan hubungan yang erat dan menginspirasi untuk merayakan cinta dan kedekatan dalam setiap langkah perjalanan bersama.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'olahraga.jpg',
            'judul_kategori' => 'Olahraga',
            'deskripsi_kategori' => 'Menampilkan semangat kompetisi, kebugaran, dan aksi dinamis dalam berbagai cabang olahraga. Dari momen-momen menegangkan di lapangan atau arena hingga kegembiraan kemenangan dan semangat tim, kategori ini mengabadikan kekuatan dan keindahan gerakan tubuh dalam aktivitas olahraga. Setiap gambar menangkap energi yang luar biasa dan dedikasi dalam mengejar prestasi dan kesehatan melalui latihan dan persaingan yang sehat.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'korea.jpg',
            'judul_kategori' => 'Korea',
            'deskripsi_kategori' => 'Menampilkan keindahan budaya, tradisi, dan kehidupan sehari-hari di Korea. Dari gemerlapnya kota metropolitan hingga ketenangan pedesaan, kategori ini mempersembahkan pesona yang khas dari negeri ginseng. Dari kuliner lezat hingga keindahan alam yang memesona, setiap gambar menggambarkan kekayaan dan keragaman yang membuat Korea begitu menarik untuk dijelajahi.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'kpop.jpg',
            'judul_kategori' => 'Kpop',
            'deskripsi_kategori' => 'Menampilkan pesona dan keberagaman dunia musik pop Korea yang sedang populer secara global. Dari penampilan panggung yang spektakuler hingga kekreatifan dalam musik dan fashion, kategori ini merayakan keunikan dan energi yang membawa penggemar dari seluruh dunia terpesona. Dari boyband hingga girl group, setiap gambar menggambarkan keanggunan, gaya, dan semangat yang mendefinisikan industri hiburan Korea modern.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'jepang.jpg',
            'judul_kategori' => 'Jepang',
            'deskripsi_kategori' => 'Menampilkan keindahan budaya, tradisi, dan kehidupan sehari-hari di Jepang. Dari gemerlapnya kota Tokyo hingga ketenangan pedesaan Kyoto, kategori ini mempersembahkan pesona yang khas dari negeri matahari terbit. Dari kuliner lezat seperti sushi dan ramen hingga keindahan alam yang memesona seperti gunung dan taman-taman berbunga, setiap gambar menggambarkan kekayaan dan keragaman yang membuat Jepang begitu menarik untuk dijelajahi.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'anime.jpg',
            'judul_kategori' => 'Anime',
            'deskripsi_kategori' => 'Menampilkan dunia fantasi yang tak terbatas, kisah-kisah epik, dan karakter-karakter yang memikat dari dunia animasi Jepang. Dari petualangan yang mendebarkan hingga cerita-cerita yang penuh emosi, kategori ini mempersembahkan pesona yang tak terlupakan dari anime. Dari genre-action hingga romance, setiap gambar menangkap keajaiban dan keindahan dari seni animasi yang menghibur dan menginspirasi jutaan penggemar di seluruh dunia.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'indonesia.jpg',
            'judul_kategori' => 'Indonesia',
            'deskripsi_kategori' => 'Menampilkan keindahan alam, keanekaragaman budaya, dan kehidupan sehari-hari di Indonesia. Dari pantai-pantai eksotis hingga gunung-gunung yang megah, kategori ini mempersembahkan pesona alam yang memukau dari kepulauan Nusantara. Dari keragaman tradisi dan adat istiadat hingga kelezatan kuliner yang khas, setiap gambar menggambarkan kekayaan dan keindahan yang membuat Indonesia begitu menarik dan berwarna.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'film.jpg',
            'judul_kategori' => 'Film',
            'deskripsi_kategori' => 'Menampilkan kisah-kisah yang menginspirasi, hiburan yang mendebarkan, dan keindahan dari dunia perfilman. Dari drama yang mendalam hingga aksi yang mengagumkan, kategori ini mempersembahkan pesona dari berbagai genre film. Dari karya-karya sinematik yang memenangkan penghargaan hingga film-film blockbuster yang menghibur, setiap gambar menangkap momen-momen ikonik dan memukau dari dunia perfilman yang tak pernah habis memberikan inspirasi.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'series.jpg',
            'judul_kategori' => 'Series',
            'deskripsi_kategori' => 'M',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kategori_foto')->insert([
            'thumbnail_kategori' => 'dunia-hiburan.jpg',
            'judul_kategori' => 'Dunia Hiburan',
            'deskripsi_kategori' => 'Menampilkan gemerlapnya panggung, kegembiraan dari penampilan, dan keragaman dari industri hiburan global. Dari bintang-bintang film yang bersinar di karpet merah hingga penampilan yang memukau di atas panggung, kategori ini mempersembahkan pesona dan kegembiraan dari dunia hiburan. Dari dunia musik yang dinamis hingga seni pertunjukan yang menginspirasi, setiap gambar menangkap momen-momen ikonik dan keindahan dari dunia hiburan yang selalu memukau.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
