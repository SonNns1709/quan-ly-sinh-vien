<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function index()
    {
        $lopHocs = LopHoc::withCount('sinhViens')->latest()->get();

        return view('lop-hoc.index', compact('lopHocs'));
    }

    public function create()
    {
        return view('lop-hoc.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ma_lop' => 'required|string|unique:lop_hocs,ma_lop',
            'ten_lop' => 'required|string|max:255',
            'khoa' => 'nullable|string|max:255',
        ]);

        LopHoc::create($validated);

        return redirect()->route('lop-hoc.index')->with('success', 'Thêm lớp học thành công!');
    }

    public function edit(LopHoc $lop_hoc)
    {
        return view('lop-hoc.edit', ['lopHoc' => $lop_hoc]);
    }

    public function update(Request $request, LopHoc $lop_hoc)
    {
        $validated = $request->validate([
            'ma_lop' => 'required|string|unique:lop_hocs,ma_lop,' . $lop_hoc->id,
            'ten_lop' => 'required|string|max:255',
            'khoa' => 'nullable|string|max:255',
        ]);

        $lop_hoc->update($validated);

        return redirect()->route('lop-hoc.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(LopHoc $lop_hoc)
    {
        $lop_hoc->delete();

        return redirect()->route('lop-hoc.index')->with('success', 'Đã xoá lớp học!');
    }
}
