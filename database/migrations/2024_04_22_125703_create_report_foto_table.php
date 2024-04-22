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
        Schema::create('report_foto', function (Blueprint $table) {
            $table->id('report_foto_id');
            $table->unsignedBigInteger('foto_id');
            $table->foreign('foto_id')->references('foto_id')->on('foto')->onDelete('cascade');
            $table->unsignedBigInteger('jenislaporan_id');
            $table->foreign('jenislaporan_id')->references('jenislaporan_id')->on('jenis_laporan')->onDelete('cascade');
            $table->unsignedBigInteger('pelapor_id');
            $table->foreign('pelapor_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_foto');
    }
};
