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
        Schema::create('foto', function (Blueprint $table) {
            $table->id('foto_id');
            $table->text('judul_foto');
            $table->string('deskripsi_foto')->nullable();
            $table->date('tanggal_unggahan');
            $table->string('lokasi_foto');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori_foto')->onDelete('cascade');
            $table->unsignedBigInteger('album_id')->nullable();
            $table->foreign('album_id')->references('album_id')->on('album')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
