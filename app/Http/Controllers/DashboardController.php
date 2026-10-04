<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\SinhVien;

class DashboardController extends Controller
{
    public function index()
    {
        $tongSinhVien = SinhVien::count();
        $tongLopHoc = LopHoc::count();
        $theoLop = LopHoc::withCount('sinhViens')->get();

        return view('dashboard', compact('tongSinhVien', 'tongLopHoc', 'theoLop'));
    }
}
