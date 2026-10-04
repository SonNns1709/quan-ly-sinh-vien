@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
    <h1>Đăng nhập Admin</h1>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br>

        <label>Mật khẩu</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Đăng nhập</button>
    </form>
@endsection
