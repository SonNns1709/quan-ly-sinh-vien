@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Tổng số sinh viên</h5>
                    <p class="card-text fs-2">{{ $tongSinhVien }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Tổng số lớp học</h5>
                    <p class="card-text fs-2">{{ $tongLopHoc }}</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Số sinh viên theo từng lớp</h2>
    <table class="table table-striped table-bordered">
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
