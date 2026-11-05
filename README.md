# MiTV Pro - Hệ Thống Hỗ Trợ & Tối Ưu Tivi Xiaomi Chuyên Nghiệp

Dự án website dịch vụ và tiện ích tự động hóa hỗ trợ người dùng Tivi Xiaomi (Android TV / PatchWall / Google TV).

---

## 🌟 Tính Năng Chính
1. **Kho Mã Tải Downloader (`downloader.php`)**:
   - Tích hợp mã số Downloader độc quyền: `3041587`.
   - Tính năng sao chép 1 chạm thông minh, kèm danh sách mã tải nhanh từng app: SmartTube, TiviMate, Monster TV.
2. **Ứng Dụng MiTV Optimizer Pro (`optimizer.php`)**:
   - Trang giới thiệu và cung cấp link tải trực tiếp APK phần mềm tối ưu RAM và dọn sạch ứng dụng rác Xiaomi.
3. **Công Cụ Tra Cứu Model Online (`tool-check.php`)**:
   - Tra cứu cấu hình chip/RAM theo đời máy tivi (EA55, A Pro, Mi TV 4S, Redmi MAX...) và tự động đưa ra gói tối ưu tương thích.
4. **Cẩm Nang Chặn Quảng Cáo (`guide-adblock.php`)**:
   - 3 bước chi tiết cấu hình Private DNS AdGuard và tắt tiến trình MSA thu thập quảng cáo.
5. **Bộ Tài Liệu Pháp Lý & Bảo Mật Hoàn Chỉnh**:
   - `terms.php`: Điều khoản dịch vụ và chính sách bảo hành rõ ràng.
   - `privacy.php`: Cam kết bảo mật quyền riêng tư, kết nối điều khiển từ xa mã hóa 256-bit.
   - `disclaimer.php`: Tuyên bố miễn trừ trách nhiệm thương hiệu và mã nguồn mở.

---

## 🔒 Tiêu Chuẩn Bảo Mật (Security Standards)
- **Error Obfuscation**: Tắt hiển thị lỗi PHP (`display_errors = 0`), ghi log an toàn tại server.
- **Security Headers**: Trang bị chuẩn OWASP: `X-Frame-Options`, `X-Content-Type-Options: nosniff`, `X-XSS-Protection`, `CSP`.
- **Anti-XSS & Anti-CSRF**: Session cookie HttpOnly, SameSite=Lax và hàm làm sạch dữ liệu `clean_output()`.
- **Safe File Download**: Chống Path Traversal với whitelist file APK hợp lệ.

---

## 🚀 Hướng Dẫn Triển Khai (Deployment)
### 1. Chạy trên máy nội bộ (Localhost)
```bash
# Khởi chạy server PHP trên cổng 8000
php -S 127.0.0.1:8000 -t ./
```

### 2. Triển khai lên Hosting / VPS (cPanel, DirectAdmin, Nginx, Apache)
1. Nén toàn bộ thư mục web thành file `.zip`.
2. Tải lên thư mục `public_html` của hosting.
3. Cấu hình trỏ tên miền (ví dụ: `mitvpro.vn` hoặc `hotro-tivixiaomi.com`) về địa chỉ IP của Hosting.
4. Đăng ký mã số rút gọn trên [AFTVnews Downloader Short Code Service](https://go.aftvnews.com/) trỏ về URL website để khách hàng có thể nhập mã số 6 chữ số trực tiếp trên tivi.
