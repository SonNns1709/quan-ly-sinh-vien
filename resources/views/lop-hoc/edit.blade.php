@extends('layouts.app')

@section('title', 'Sửa Lớp học')

@section('content')
    <h1 class="mb-4">Sửa Lớp học</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('lop-hoc.update', $lopHoc) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Mã lớp</label>
            <input type="text" name="ma_lop" value="{{ old('ma_lop', $lopHoc->ma_lop) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="ten_lop" value="{{ old('ten_lop', $lopHoc->ten_lop) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Khoa</label>
            <input type="text" name="khoa" value="{{ old('khoa', $lopHoc->khoa) }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
