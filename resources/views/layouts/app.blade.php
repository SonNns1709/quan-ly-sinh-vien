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
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} - Đồ án Quản lý Sinh viên</p>
    </footer>
</body>
</html>
