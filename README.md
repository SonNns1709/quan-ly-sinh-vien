# Quản lý Sinh viên

Đồ án học phần **Phần mềm nguồn mở nâng cao** (2 tín chỉ) — xây dựng bằng Laravel 13.

## Công nghệ sử dụng

- Laravel 13 (PHP 8.2+)
- SQLite
- Bootstrap 5
- Pest / PHPUnit (testing)

## Tính năng

- Đăng nhập / đăng xuất Admin, bảo vệ khu quản trị bằng middleware
- Quản lý Sinh viên: thêm, xem, sửa, xoá, tìm kiếm, phân trang, upload ảnh đại diện
- Quản lý Lớp học: thêm, xem, sửa, xoá
- Dashboard thống kê số sinh viên theo từng lớp

## Cài đặt

```bash
git clone https://github.com/<ten-github-cua-ban>/quan-ly-sinh-vien.git
cd quan-ly-sinh-vien
composer install
npm install && npm run build
copy .env.example .env
php artisan key:generate
copy nul database\database.sqlite
php artisan migrate
```

Tạo tài khoản Admin:

```bash
php artisan tinker
```

```php
\App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'matkhau123']);
```

Chạy project:

```bash
composer run dev
```

Truy cập `http://localhost:8000`, đăng nhập bằng tài khoản vừa tạo.

## Kiểm thử

```bash
php artisan test
```

## Ảnh chụp màn hình

_(chèn ảnh Dashboard, danh sách Sinh viên, form thêm sinh viên)_
