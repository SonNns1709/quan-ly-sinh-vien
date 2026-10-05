@extends('layouts.app')

@section('title', 'Sửa Sinh viên')

@section('content')
    <h1 class="mb-4">Sửa Sinh viên</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sinh-vien.update', $sinhVien) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">MSSV</label>
            <input type="text" name="mssv" value="{{ old('mssv', $sinhVien->mssv) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="ho_ten" value="{{ old('ho_ten', $sinhVien->ho_ten) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày sinh</label>
            <input type="date" name="ngay_sinh" value="{{ old('ngay_sinh', $sinhVien->ngay_sinh) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <select name="gioi_tinh" class="form-select">
                <option value="">-- Chọn --</option>
                <option value="Nam" @selected(old('gioi_tinh', $sinhVien->gioi_tinh ?? '') === 'Nam')>Nam</option>
                <option value="Nữ" @selected(old('gioi_tinh', $sinhVien->gioi_tinh ?? '') === 'Nữ')>Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $sinhVien->email) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="sdt" value="{{ old('sdt', $sinhVien->sdt) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="dia_chi" value="{{ old('dia_chi', $sinhVien->dia_chi) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Lớp học</label>
            <select name="lop_hoc_id" class="form-select">
                @foreach ($lopHocs as $lop)
                    <option value="{{ $lop->id }}" @selected($lop->id === $sinhVien->lop_hoc_id)>{{ $lop->ten_lop }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh đại diện hiện tại</label><br>
            @if ($sinhVien->anh_dai_dien)
                <img src="{{ asset('storage/' . $sinhVien->anh_dai_dien) }}" width="80" class="rounded mb-2"><br>
            @endif
            <input type="file" name="anh_dai_dien" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
