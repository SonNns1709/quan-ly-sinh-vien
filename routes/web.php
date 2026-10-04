<?php

use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\SinhVienController;

Route::get('/', [TrangChuController::class, 'index'])->name('trang-chu');
Route::get('/gioi-thieu', [TrangChuController::class, 'gioiThieu'])->name('gioi-thieu');
Route::resource('sinh-vien', SinhVienController::class);
