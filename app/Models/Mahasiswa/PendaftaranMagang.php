<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa\LowonganMagang;

class PendaftaranMagang extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_magangs'; 
    protected $guarded = ['id'];

    // Ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Ke Info Lowongan (PENTING: Ini menghubungkan ke tabel magang_lowongan)
    // Pastikan Anda punya model bernama MagangLowongan.php
    public function lowongan()
    {
        return $this->belongsTo(LowonganMagang::class, 'magang_lowongan_id');
    }
}