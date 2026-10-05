@extends('layouts.app')

@section('title', 'Danh sách Sinh viên')

@section('content')
    <h1 class="mb-4">Danh sách Sinh viên</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('sinh-vien.create') }}" class="btn btn-primary">+ Thêm sinh viên</a>

        <form method="GET" action="{{ route('sinh-vien.index') }}" class="d-flex">
            <input type="text" name="tu_khoa" value="{{ $tuKhoa }}" class="form-control me-2" placeholder="Tìm theo tên hoặc MSSV">
            <button type="submit" class="btn btn-outline-secondary">Tìm</button>
        </form>
    </div>

    <table class="table table-striped table-bordered align-middle">
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
                            <img src="{{ asset('storage/' . $sv->anh_dai_dien) }}" width="50" class="rounded">
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $sv->ho_ten }}</td>
                    <td>{{ $sv->lopHoc->ten_lop ?? '—' }}</td>
                    <td>{{ $sv->email }}</td>
                    <td>
                        <a href="{{ route('sinh-vien.edit', $sv) }}" class="btn btn-sm btn-outline-primary">Sửa</a>
                        <form method="POST" action="{{ route('sinh-vien.destroy', $sv) }}" class="d-inline" onsubmit="return confirm('Xoá sinh viên này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sinhViens->links('pagination::bootstrap-5') }}
@endsection
