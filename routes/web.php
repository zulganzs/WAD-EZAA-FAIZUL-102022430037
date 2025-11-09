<?php


use Illuminate\Support\Facades\Route;
# 1. Import controller agar bisa digunakan
use App\Http\Controllers\KucingController;
# 2. Buatlah Route untuk menampilkan daftar kucing
Route::get('/kucing', [KucingController::class, 'index']);
# 3. Buatlah Route untuk menampilkan detail satu kucing
Route::get('/kucing/{id}', [KucingController::class, 'show']);