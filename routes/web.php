<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\TrangChuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\DashboardController;

Route::get('/', [TrangChuController::class, 'index'])->name('trang-chu');
Route::get('/gioi-thieu', [TrangChuController::class, 'gioiThieu'])->name('gioi-thieu');
Route::get('/hello/{ten}', function (string $ten) {
    return "Xin chào, {$ten}!";
})->name('hello');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('sinh-vien', SinhVienController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('sinh-vien', SinhVienController::class);
    Route::resource('lop-hoc', LopHocController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// dong nay la loi co y
