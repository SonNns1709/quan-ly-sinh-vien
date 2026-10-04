<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Quản lý Sinh viên')</title>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Trang chủ</a>
        <a href="{{ url('/gioi-thieu') }}">Giới thiệu</a>

        @auth
            <a href="{{ route('sinh-vien.index') }}">Sinh viên</a>
            <a href="{{ route('lop-hoc.index') }}">Lớp học</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit">Đăng xuất ({{ auth()->user()->name }})</button>
            </form>
        @else
            <a href="{{ route('login') }}">Đăng nhập</a>
        @endauth
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} - Đồ án Quản lý Sinh viên</p>
    </footer>
</body>
</html>
