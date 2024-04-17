<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('album', function (Blueprint $table) {
            $table->id('album_id');
            $table->string('nama_album');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_dibuat')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('album');
    }
};
