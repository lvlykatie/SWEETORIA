# Hướng Dẫn Cài Đặt Sweetoria

Sweetoria là một nền tảng cung cấp nguyên liệu làm bánh nhanh chóng và dễ dàng. Hướng dẫn này sẽ giúp bạn cài đặt và chạy ứng dụng trên hệ thống của mình.

## Yêu Cầu Hệ Thống

- **Hệ điều hành:** Windows, macOS, hoặc Linux.
- **PHP:** Phiên bản >= 8.0
- **Composer:** Công cụ quản lý phụ thuộc cho PHP.
- **Node.js:** Phiên bản >= 16.x (kèm theo npm).
- **Database:** MySQL hoặc MariaDB.
- **Trình duyệt:** Phiên bản mới nhất của Google Chrome, Firefox, hoặc Edge.

## Các Bước Cài Đặt

### 1. Tải Dự Án

1. Clone mã nguồn từ repository:
   ```bash
   git clone https://github.com/lvlykatie/sweetoria.git
   ```
2. Điều hướng vào thư mục dự án:
   ```bash
   cd SWEETORIA
   ```

### 2. Cài Đặt Phụ Thuộc

1. Cài đặt các gói PHP:
   ```bash
   composer install
   ```
2. Cài đặt các gói JavaScript:
   ```bash
   npm install
   ```

### 3. Cấu Hình Dự Án

1. Tạo tệp `.env` từ tệp mẫu:
   ```bash
   cp .env.example .env
   ```
2. Chỉnh sửa tệp `.env` để cấu hình cơ sở dữ liệu:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sweetoria
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### 4. Thiết Lập Cơ Sở Dữ Liệu

1. Tạo cơ sở dữ liệu:
   ```sql
   CREATE DATABASE sweetoria;
   ```
2. Chạy các migration:
   ```bash
   php artisan migrate
   ```

### 5. Build Frontend

1. Build assets:
   ```bash
   npm run dev
   ```
   *(hoặc `npm run prod` cho môi trường production)*

### 6. Chạy Ứng Dụng

1. Khởi động server:
   ```bash
   php artisan serve
   ```
2. Mở trình duyệt và truy cập địa chỉ:
   ```
   http://127.0.0.1:8000
   ```

## Các Lệnh Hữu Ích

- Chạy test:
  ```bash
  php artisan test
  ```
- Làm sạch cache:
  ```bash
  php artisan cache:clear
  ```
- Tạo dữ liệu mẫu:
  ```bash
  php artisan db:seed
  ```

## Hỗ Trợ

Nếu bạn gặp vấn đề trong quá trình cài đặt, vui lòng liên hệ qua email [22521366@gm.uit.edu.vn](mailto:22521366@gm.uit.edu.vn) hoặc tham khảo [wiki dự án](https://github.com/lvlykatie/sweetoria/wiki).

Chúc bạn thành công!
