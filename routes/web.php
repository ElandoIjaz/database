<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Route pesanan (pencarian admin & umum)
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/admin/pesanan', [PesananController::class, 'adminSearch'])->name('admin.pesanan');

// Route pencarian, filter, dan sorting produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
