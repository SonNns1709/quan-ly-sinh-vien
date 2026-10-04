<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
     public function index(Request $request)
    {
        $tuKhoa = $request->query('tu_khoa');

        $sinhViens = SinhVien::with('lopHoc')
            ->when($tuKhoa, function ($query, $tuKhoa) {
                $query->where('ho_ten', 'like', "%{$tuKhoa}%")
                    ->orWhere('mssv', 'like', "%{$tuKhoa}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('sinh-vien.index', compact('sinhViens', 'tuKhoa'));
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
            'anh_dai_dien' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('anh_dai_dien')) {
            $validated['anh_dai_dien'] = $request->file('anh_dai_dien')->store('sinh-vien', 'public');
        }

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
            'anh_dai_dien' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('anh_dai_dien')) {
            $validated['anh_dai_dien'] = $request->file('anh_dai_dien')->store('sinh-vien', 'public');
        }

        $sinh_vien->update($validated);

        return redirect()->route('sinh-vien.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(SinhVien $sinh_vien)
    {
        $sinh_vien->delete();

        return redirect()->route('sinh-vien.index')->with('success', 'Đã xoá sinh viên!');
    }
}
