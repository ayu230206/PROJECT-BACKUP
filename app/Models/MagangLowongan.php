<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagangLowongan extends Model
{
    use HasFactory;

    // PENTING: Karena nama tabel di database Anda 'magang_lowongan'
    protected $table = 'magang_lowongan'; 
    
    protected $guarded = ['id'];

    // Opsional: Relasi ke User pembuat lowongan (jika perlu)
    public function pembuat()
    {
        return $this->belongsTo(User::class, 'diinput_oleh_id');
    }
}