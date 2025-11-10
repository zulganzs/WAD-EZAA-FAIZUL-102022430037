<?php

use Illuminate\Support\Facades\Route;
# 1. Import controller yang akan digunakan
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;


# 2. Tambahkan route untuk halaman dashboard dengan metode GET yang memanggil fungsi index() dari DashboardController.
Route::get('/', [DashboardController::class, 'index']);
# 3. Tambahkan route untuk halaman profil dengan metode GET yang memanggil fungsi index() dari ProfileController.
Route::get('/profil', [ProfileController::class, 'index']);
