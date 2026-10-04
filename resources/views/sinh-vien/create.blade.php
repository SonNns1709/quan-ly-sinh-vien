@extends('layouts.app')

@section('title', 'Thêm Sinh viên')

@section('content')
    <h1>Thêm Sinh viên</h1>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sinh-vien.store') }}">
        @csrf

        <label>MSSV</label><br>
        <input type="text" name="mssv" value="{{ old('mssv') }}"><br>

        <label>Họ tên</label><br>
        <input type="text" name="ho_ten" value="{{ old('ho_ten') }}"><br>

        <label>Ngày sinh</label><br>
        <input type="date" name="ngay_sinh" value="{{ old('ngay_sinh') }}"><br>

        <label>Giới tính</label><br>
        <input type="text" name="gioi_tinh" value="{{ old('gioi_tinh') }}"><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br>

        <label>Số điện thoại</label><br>
        <input type="text" name="sdt" value="{{ old('sdt') }}"><br>

        <label>Địa chỉ</label><br>
        <input type="text" name="dia_chi" value="{{ old('dia_chi') }}"><br>

        <label>Lớp học</label><br>
        <select name="lop_hoc_id">
            @foreach ($lopHocs as $lop)
                <option value="{{ $lop->id }}">{{ $lop->ten_lop }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Lưu</button>
    </form>
@endsection
