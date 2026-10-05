@extends('layouts.app')

@section('title', 'Thêm Lớp học')

@section('content')
    <h1 class="mb-4">Thêm Lớp học</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('lop-hoc.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Mã lớp</label>
            <input type="text" name="ma_lop" value="{{ old('ma_lop') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="ten_lop" value="{{ old('ten_lop') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Khoa</label>
            <input type="text" name="khoa" value="{{ old('khoa') }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
