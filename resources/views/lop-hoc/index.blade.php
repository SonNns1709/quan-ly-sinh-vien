@extends('layouts.app')

@section('title', 'Danh sách Lớp học')

@section('content')
    <h1 class="mb-4">Danh sách Lớp học</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('lop-hoc.create') }}" class="btn btn-primary mb-3">+ Thêm lớp học</a>

    <table class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Khoa</th>
                <th>Số sinh viên</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lopHocs as $lop)
                <tr>
                    <td>{{ $lop->ma_lop }}</td>
                    <td>{{ $lop->ten_lop }}</td>
                    <td>{{ $lop->khoa }}</td>
                    <td>{{ $lop->sinh_viens_count }}</td>
                    <td>
                        <a href="{{ route('lop-hoc.edit', $lop) }}" class="btn btn-sm btn-outline-primary">Sửa</a>
                        <form method="POST" action="{{ route('lop-hoc.destroy', $lop) }}" class="d-inline" onsubmit="return confirm('Xoá lớp này? Toàn bộ sinh viên trong lớp cũng sẽ bị xoá!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
