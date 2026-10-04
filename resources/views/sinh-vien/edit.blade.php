@extends('layouts.app')

@section('title', 'Sửa Sinh viên')

@section('content')
    <h1>Sửa Sinh viên</h1>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sinh-vien.update', $sinhVien) }}">
        @csrf
        @method('PUT')

        <label>MSSV</label><br>
        <input type="text" name="mssv" value="{{ old('mssv', $sinhVien->mssv) }}"><br>

        <label>Họ tên</label><br>
        <input type="text" name="ho_ten" value="{{ old('ho_ten', $sinhVien->ho_ten) }}"><br>

        <label>Ngày sinh</label><br>
        <input type="date" name="ngay_sinh" value="{{ old('ngay_sinh', $sinhVien->ngay_sinh) }}"><br>

        <label>Giới tính</label><br>
        <input type="text" name="gioi_tinh" value="{{ old('gioi_tinh', $sinhVien->gioi_tinh) }}"><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $sinhVien->email) }}"><br>

        <label>Số điện thoại</label><br>
        <input type="text" name="sdt" value="{{ old('sdt', $sinhVien->sdt) }}"><br>

        <label>Địa chỉ</label><br>
        <input type="text" name="dia_chi" value="{{ old('dia_chi', $sinhVien->dia_chi) }}"><br>

        <label>Lớp học</label><br>
        <select name="lop_hoc_id">
            @foreach ($lopHocs as $lop)
                <option value="{{ $lop->id }}" @selected($lop->id === $sinhVien->lop_hoc_id)>{{ $lop->ten_lop }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Cập nhật</button>
    </form>
@endsection
