@extends('layouts.app')

@section('title', 'Danh sách Sinh viên')

@section('content')
    <h1>Danh sách Sinh viên</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('sinh-vien.create') }}">+ Thêm sinh viên</a></p>

    <form method="GET" action="{{ route('sinh-vien.index') }}">
        <input type="text" name="tu_khoa" value="{{ $tuKhoa }}" placeholder="Tìm theo tên hoặc MSSV">
        <button type="submit">Tìm</button>
    </form>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>MSSV</th>
                <th>Ảnh</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinhViens as $sv)
                <tr>
                    <td>{{ $sv->mssv }}</td>
                    <td>
                        @if ($sv->anh_dai_dien)
                            <img src="{{ asset('storage/' . $sv->anh_dai_dien) }}" width="50">
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $sv->ho_ten }}</td>
                    <td>{{ $sv->lopHoc->ten_lop ?? '—' }}</td>
                    <td>{{ $sv->email }}</td>
                    <td>
                        <a href="{{ route('sinh-vien.edit', $sv) }}">Sửa</a>
                        <form method="POST" action="{{ route('sinh-vien.destroy', $sv) }}" style="display:inline" onsubmit="return confirm('Xoá sinh viên này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sinhViens->links() }}
@endsection
