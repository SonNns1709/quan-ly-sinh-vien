<?php

use App\Http\Controllers\TrangChuController;

Route::get('/', [TrangChuController::class, 'index'])->name('trang-chu');
Route::get('/gioi-thieu', [TrangChuController::class, 'gioiThieu'])->name('gioi-thieu');
