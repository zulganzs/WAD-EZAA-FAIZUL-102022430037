<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# 1. Import model User agar dapat digunakan di dalam controller.
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        # 2. Ambil satu data mahasiswa dari model User menggunakan fungsi first().
        $mahasiswa = User::first();
        # 3. Tambahkan logika untuk menentukan ucapan salam
        $hours = date('H');
        $tanggal = $this->getTanggal();
        $salam = match (true) {
            $hours >= 5 && $hours < 12 => "Selamat Pagi",
            $hours >= 12 && $hours < 15 => "Selamat Siang",
            $hours >= 15 && $hours < 18 => "Selamat Sore",
            default => "Selamat Malam",
        };
        # 4. Buat variabel untuk menampilkan waktu akses dalam format HH:MM:SS.
        $accessTime = date("H:i:s");
        # 5. Buat variabel dengan format tanggal dd-mm-yyyy. (Gunakan method getTanggal() untuk memproses tanggal.)
        # 6. Kirim data ke view dashboard menggunakan fungsi compact().
        return view('dashboard', compact('mahasiswa', 'salam', 'accessTime', 'tanggal'));
    }

    # 7. Buat method private getTanggal() untuk menghasilkan tanggal saat ini dalam format dd-mm-yyyy.
    private function getTanggal() {
        return $tanggal = date("d-m-y");
    }
}
