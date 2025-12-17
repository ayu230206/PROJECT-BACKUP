<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendaftaranMagang;
use Illuminate\Support\Facades\Auth;


class RiwayatMagangController extends Controller
{
    public function index()
    {
        // Ambil data pendaftaran milik user yang sedang login
        // 'with' digunakan untuk mengambil data relasi lowongan biar tidak error saat dipanggil di view
        $riwayat = PendaftaranMagang::with('lowongan')
                    ->where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Kirim data ke view riwayat
        return view('mahasiswa.magang.riwayat', compact('riwayat'));
    }
}