<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_foto', function (Blueprint $table) {
            $table->id('kategori_id');
            $table->string('thumbnail_kategori');
            $table->string('judul_kategori');
            $table->text('deskripsi_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_fotos');
    }
};
