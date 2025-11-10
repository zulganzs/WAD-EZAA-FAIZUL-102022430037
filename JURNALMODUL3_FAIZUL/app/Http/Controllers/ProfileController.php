<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# 1. Import model User agar dapat digunakan di dalam controller.
use App\Models\User;

class ProfileController extends Controller
{

    public function index()
    {
        # 2. Ambil satu data mahasiswa dari model User menggunakan fungsi first().
        $mahasiswa = User::first();
        # 3. Kirim data mahasiswa ke view profile menggunakan fungsi compact().
        return view('profile', compact('mahasiswa', 'salam', 'accessTime'));
    }

}
