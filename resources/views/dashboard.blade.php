@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    <p>Tổng số sinh viên: <strong>{{ $tongSinhVien }}</strong></p>
    <p>Tổng số lớp học: <strong>{{ $tongLopHoc }}</strong></p>

    <h2>Số sinh viên theo từng lớp</h2>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Lớp</th>
                <th>Số sinh viên</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($theoLop as $lop)
                <tr>
                    <td>{{ $lop->ten_lop }}</td>
                    <td>{{ $lop->sinh_viens_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
