@extends('layouts.app')

@section('title', 'Danh sách Lớp học')

@section('content')
    <h1>Danh sách Lớp học</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('lop-hoc.create') }}">+ Thêm lớp học</a></p>

    <table border="1" cellpadding="8">
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
                        <a href="{{ route('lop-hoc.edit', $lop) }}">Sửa</a>
                        <form method="POST" action="{{ route('lop-hoc.destroy', $lop) }}" style="display:inline" onsubmit="return confirm('Xoá lớp này? Toàn bộ sinh viên trong lớp cũng sẽ bị xoá!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
