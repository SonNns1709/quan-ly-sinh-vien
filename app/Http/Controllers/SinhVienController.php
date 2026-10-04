<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function index()
    {
        $sinhViens = SinhVien::with('lopHoc')->latest()->get();

        return view('sinh-vien.index', compact('sinhViens'));
    }

    public function create()
    {
        $lopHocs = LopHoc::all();

        return view('sinh-vien.create', compact('lopHocs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mssv' => 'required|string|unique:sinh_viens,mssv',
            'ho_ten' => 'required|string|max:255',
            'ngay_sinh' => 'nullable|date',
            'gioi_tinh' => 'nullable|string',
            'email' => 'required|email|unique:sinh_viens,email',
            'sdt' => 'nullable|string|max:20',
            'dia_chi' => 'nullable|string',
            'lop_hoc_id' => 'required|exists:lop_hocs,id',
        ]);

        SinhVien::create($validated);

        return redirect()->route('sinh-vien.index')->with('success', 'Thêm sinh viên thành công!');
    }

     public function edit(SinhVien $sinh_vien)
    {
        $lopHocs = LopHoc::all();

        return view('sinh-vien.edit', [
            'sinhVien' => $sinh_vien,
            'lopHocs' => $lopHocs,
        ]);
    }

    public function update(Request $request, SinhVien $sinh_vien)
    {
        $validated = $request->validate([
            'mssv' => 'required|string|unique:sinh_viens,mssv,' . $sinh_vien->id,
            'ho_ten' => 'required|string|max:255',
            'ngay_sinh' => 'nullable|date',
            'gioi_tinh' => 'nullable|string',
            'email' => 'required|email|unique:sinh_viens,email,' . $sinh_vien->id,
            'sdt' => 'nullable|string|max:20',
            'dia_chi' => 'nullable|string',
            'lop_hoc_id' => 'required|exists:lop_hocs,id',
        ]);

        $sinh_vien->update($validated);

        return redirect()->route('sinh-vien.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(SinhVien $sinh_vien)
    {
        $sinh_vien->delete();

        return redirect()->route('sinh-vien.index')->with('success', 'Đã xoá sinh viên!');
    }
}
