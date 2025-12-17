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
        Schema::create('pendaftaran_magangs', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke User (Mahasiswa)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Relasi ke Lowongan (Ambil dari tabel magang_lowongan yang Anda kirim sebelumnya)
            // Pastikan nama tabel di database benar-benar 'magang_lowongan'
            $table->foreignId('magang_lowongan_id')->constrained('magang_lowongan')->onDelete('cascade');

            $table->date('tanggal_daftar');
            $table->enum('status', ['proses', 'diterima', 'ditolak'])->default('proses');
            $table->string('file_cv')->nullable(); // Untuk menyimpan nama file PDF
            $table->text('catatan')->nullable(); // Opsional: jika admin ingin memberi alasan tolak
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_magangs');
    }
};
