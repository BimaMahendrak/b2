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
        // Tabel kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 100);
        });

        // Tabel pertanyaan
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id('id_pertanyaan');
            $table->unsignedBigInteger('id_kategori');
            $table->text('pertanyaan');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });

        // Tabel responden
        Schema::create('responden', function (Blueprint $table) {
            $table->id('id_responden');
            $table->string('nama_lengkap', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('email', 100)->unique();
            $table->string('tempat_tanggal_lahir', 100)->nullable();
            $table->date('tanggal_ujian')->nullable();
        });

        // Tabel jawaban
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id('id_jawaban');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->unsignedBigInteger('id_responden');
            $table->text('jawaban');
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaan')->onDelete('cascade');
            $table->foreign('id_responden')->references('id_responden')->on('responden')->onDelete('cascade');
        });

        // Tabel feedback
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('id_feedback');
            $table->unsignedBigInteger('id_responden');
            $table->integer('rating')->check('rating >= 1 AND rating <= 5');
            $table->text('ulasan')->nullable();
            $table->foreign('id_responden')->references('id_responden')->on('responden')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
        Schema::dropIfExists('jawaban');
        Schema::dropIfExists('responden');
        Schema::dropIfExists('pertanyaan');
        Schema::dropIfExists('kategori');
    }
};
