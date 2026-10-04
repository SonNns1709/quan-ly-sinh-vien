@extends('layouts.app')

@section('title', 'Thêm Lớp học')

@section('content')
    <h1>Thêm Lớp học</h1>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('lop-hoc.store') }}">
        @csrf

        <label>Mã lớp</label><br>
        <input type="text" name="ma_lop" value="{{ old('ma_lop') }}"><br>

        <label>Tên lớp</label><br>
        <input type="text" name="ten_lop" value="{{ old('ten_lop') }}"><br>

        <label>Khoa</label><br>
        <input type="text" name="khoa" value="{{ old('khoa') }}"><br><br>

        <button type="submit">Lưu</button>
    </form>
@endsection
