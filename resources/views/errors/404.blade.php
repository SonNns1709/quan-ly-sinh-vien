@extends('layouts.app')

@section('title', 'Không tìm thấy trang')

@section('content')
    <div class="text-center py-5">
        <h1 class="display-1">404</h1>
        <p class="fs-4">Trang bạn tìm không tồn tại.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Về trang chủ</a>
    </div>
@endsection
