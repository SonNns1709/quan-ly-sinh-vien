<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quản lý Sinh viên')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Quản lý Sinh viên</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ url('/') }}">Trang chủ</a>
                <a class="nav-link" href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
                @auth
                    <a class="nav-link" href="{{ route('sinh-vien.index') }}">Sinh viên</a>
                    <a class="nav-link" href="{{ route('lop-hoc.index') }}">Lớp học</a>
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-flex">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Đăng xuất ({{ auth()->user()->name }})</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="container text-center text-muted mt-5 mb-3">
        <p>&copy; {{ date('Y') }} - Đồ án Quản lý Sinh viên</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
