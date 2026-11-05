<?php
$pageTitle = 'Hướng Dẫn Chặn Quảng Cáo Tivi Xiaomi Vĩnh Viễn - MiTV Pro';
$pageDesc = 'Cách tắt quảng cáo khởi động, tắt quảng cáo ứng dụng và chặn tiến trình theo dõi MSA trên Tivi Xiaomi đơn giản 100% thành công.';
require_once __DIR__ . '/header.php';
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 960px;">
            <div style="text-align:center; margin-bottom: 36px;">
                <span class="card-tag"><i class="fas fa-shield-virus"></i> BÍ KÍP KỸ THUẬT</span>
                <h1 style="font-size:2.3rem; margin: 12px 0;">3 Bước Tắt Sạch Quảng Cáo Trên Tivi Xiaomi</h1>
                <p style="color:var(--text-muted); max-width:650px; margin:0 auto;">
                    Hướng dẫn chuẩn từ kỹ thuật viên MiTV Pro giúp bạn loại bỏ 100% các banner phiền phức và video quảng cáo 15s mỗi lần khởi động tivi.
                </p>
            </div>

            <!-- Bước 1 -->
            <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:28px; margin-bottom:24px;">
                <h3 style="font-size:1.3rem; color:var(--primary); margin-bottom:12px;">
                    <span style="background:var(--primary); color:#fff; border-radius:50%; width:28px; height:28px; display:inline-flex; align-items:center; justify-content:center; font-size:0.9rem; margin-right:8px;">1</span>
                    Cấu Hình Private DNS Chặn Quảng Cáo (AdGuard DNS)
                </h3>
                <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.7;">
                    Đây là phương pháp hiệu quả nhất để chặn máy chủ quảng cáo của Xiaomi từ cấp độ mạng Internet:
                </p>
                <ul style="padding-left:24px; margin:12px 0; color:var(--text-sub); font-size:0.92rem; line-height:1.8;">
                    <li>Mở <strong>Cài Đặt (Settings)</strong> &rarr; <strong>Mạng & Internet (Network & Internet)</strong>.</li>
                    <li>Tìm mục <strong>Private DNS (DNS Riêng Tư)</strong> (nếu tivi chạy Android 9 trở lên).</li>
                    <li>Chọn chế độ <em>Private DNS provider hostname</em> và nhập địa chỉ: <br>
                        <code style="background:#000; color:#00C853; padding:4px 10px; border-radius:6px; font-weight:700; display:inline-block; margin-top:6px;">dns.adguard-dns.com</code>
                    </li>
                    <li>Bấm <strong>Lưu (Save)</strong> và khởi động lại tivi.</li>
                </ul>
            </div>

            <!-- Bước 2 -->
            <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:28px; margin-bottom:24px;">
                <h3 style="font-size:1.3rem; color:var(--primary); margin-bottom:12px;">
                    <span style="background:var(--primary); color:#fff; border-radius:50%; width:28px; height:28px; display:inline-flex; align-items:center; justify-content:center; font-size:0.9rem; margin-right:8px;">2</span>
                    Thu Hồi Quyền Của Dịch Vụ MSA (MIUI System Ads)
                </h3>
                <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.7;">
                    MSA là tiến trình cốt lõi mà Xiaomi cài đặt sẵn để đẩy quảng cáo vào màn hình chính:
                </p>
                <ul style="padding-left:24px; margin:12px 0; color:var(--text-sub); font-size:0.92rem; line-height:1.8;">
                    <li>Vào <strong>Cài Đặt</strong> &rarr; <strong>Mật khẩu & Bảo mật</strong> &rarr; <strong>Uỷ quyền & Thu hồi (Authorization & Revocation)</strong>.</li>
                    <li>Tìm dòng có tên <strong>msa</strong> &rarr; Gạt nút sang <strong>TẮT (Disable)</strong>.</li>
                    <li>Chờ 10 giây đếm ngược rồi xác nhận <em>Thu hồi (Revoke)</em>.</li>
                </ul>
            </div>

            <!-- Bước 3 -->
            <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:28px; margin-bottom:32px;">
                <h3 style="font-size:1.3rem; color:var(--primary); margin-bottom:12px;">
                    <span style="background:var(--primary); color:#fff; border-radius:50%; width:28px; height:28px; display:inline-flex; align-items:center; justify-content:center; font-size:0.9rem; margin-right:8px;">3</span>
                    Tắt Đề Xuất Màn Hình Khóa (Wallpaper Carousel / Glance)
                </h3>
                <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.7;">
                    Nếu mỗi lần bật tivi bạn thấy các hình nền gợi ý phim hoặc bài báo không mong muốn:
                </p>
                <ul style="padding-left:24px; margin:12px 0; color:var(--text-sub); font-size:0.92rem; line-height:1.8;">
                    <li>Vào <strong>Cài Đặt</strong> &rarr; <strong>Màn hình khóa (Lock Screen)</strong>.</li>
                    <li>Chọn <strong>Glance for Mi</strong> hoặc <strong>Wallpaper Carousel</strong> &rarr; Chọn <strong>TẮT</strong>.</li>
                </ul>
            </div>

            <div style="text-align:center; padding:24px; background:rgba(255,103,0,0.1); border:1px dashed var(--primary); border-radius:14px;">
                <h4 style="font-size:1.2rem; color:var(--primary); margin-bottom:8px;">Không Có Thời Gian Tự Làm?</h4>
                <p style="color:var(--text-muted); font-size:0.92rem; margin-bottom:18px;">Kỹ thuật viên của chúng tôi có thể kết nối từ xa và xử lý trọn gói toàn bộ chỉ trong 15 phút.</p>
                <a href="<?php e(APP_ZALO); ?>" target="_blank" class="btn-primary"><i class="fas fa-headset"></i> Đăng Ký Xử Lý Từ Xa (Chỉ Từ 99k)</a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
