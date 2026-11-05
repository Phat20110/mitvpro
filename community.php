<?php
$pageTitle = 'Cộng Đồng Chia Sẻ & Hướng Dẫn Kỹ Thuật Tivi Xiaomi - MiTV Pro';
$pageDesc = 'Kho tài liệu hướng dẫn khắc phục các sự cố thường gặp nhất trên tivi Xiaomi: mất tiếng, lỗi giọng nói remote, treo logo, không nhận wifi 5GHz.';
require_once __DIR__ . '/header.php';
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 1040px;">
            <div style="text-align:center; margin-bottom: 36px;">
                <span class="card-tag"><i class="fas fa-graduation-cap"></i> CẨM NANG KỸ THUẬT</span>
                <h1 style="font-size:2.3rem; margin: 10px 0;">Cộng Đồng Hướng Dẫn & Xử Lý Sự Cố Tivi Xiaomi</h1>
                <p style="color:var(--text-muted); max-width:680px; margin:0 auto;">
                    Tổng hợp các giải pháp thực tế từ đội ngũ kỹ thuật viên MiTV Pro giúp bạn tự xử lý các trục trặc cơ bản tại nhà mà không tốn chi phí gọi thợ.
                </p>
            </div>

            <!-- Danh sách bài viết kỹ thuật -->
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(310px, 1fr)); gap:24px; margin-bottom:40px;">
                <!-- Bài 1 -->
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <span style="font-size:0.75rem; background:rgba(255,103,0,0.15); color:var(--primary); padding:3px 8px; border-radius:4px; font-weight:700;">ÂM THANH</span>
                    <h3 style="font-size:1.15rem; margin:14px 0 8px; line-height:1.4;">Tivi Xiaomi Bị Mất Tiếng Khi Xem YouTube Hoặc Phim</h3>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                        Nguyên nhân do xung đột bộ giải mã âm thanh Dolby Audio / DTS. Cách xử lý: Vào <em>Cài đặt &rarr; Âm thanh &rarr; Đầu ra âm thanh &rarr; Chuyển từ 'Auto' sang 'PCM'</em>.
                    </p>
                    <span style="font-size:0.8rem; color:#00C853;"><i class="fas fa-thumbs-up"></i> 1,420 người đã sửa thành công</span>
                </div>

                <!-- Bài 2 -->
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <span style="font-size:0.75rem; background:rgba(33,150,243,0.15); color:#2196F3; padding:3px 8px; border-radius:4px; font-weight:700;">REMOTE & GIỌNG NÓI</span>
                    <h3 style="font-size:1.15rem; margin:14px 0 8px; line-height:1.4;">Remote Không Nhận Giọng Nói Tiếng Việt Hoặc Mất Kết Nối</h3>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                        Bấm giữ đồng thời 2 nút <strong>Home (Hình ngôi nhà)</strong> và nút <strong>Menu (9 dấu chấm)</strong> cách màn hình tivi 20cm trong 5 giây cho đến khi nghe tiếng 'Bíp' để pair lại bluetooth.
                    </p>
                    <span style="font-size:0.8rem; color:#00C853;"><i class="fas fa-thumbs-up"></i> 2,890 người đã sửa thành công</span>
                </div>

                <!-- Bài 3 -->
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <span style="font-size:0.75rem; background:rgba(255,61,61,0.15); color:#FF3D3D; padding:3px 8px; border-radius:4px; font-weight:700;">HỆ THỐNG / TREO LOGO</span>
                    <h3 style="font-size:1.15rem; margin:14px 0 8px; line-height:1.4;">Treo Logo Mi Khi Khởi Động: Cách Vào Recovery Khôi Phục</h3>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                        Rút dây nguồn tivi, giữ đồng thời nút <strong>OK</strong> và nút <strong>Back</strong> trên remote rồi cắm lại nguồn điện cho đến khi màn hình Recovery xuất hiện, chọn <em>Wipe data / Factory reset</em>.
                    </p>
                    <span style="font-size:0.8rem; color:#00C853;"><i class="fas fa-thumbs-up"></i> 950 người đã sửa thành công</span>
                </div>

                <!-- Bài 4 -->
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <span style="font-size:0.75rem; background:rgba(0,200,83,0.15); color:#00C853; padding:3px 8px; border-radius:4px; font-weight:700;">KẾT NỐI WIFI</span>
                    <h3 style="font-size:1.15rem; margin:14px 0 8px; line-height:1.4;">Tivi Không Thấy Sóng Wifi 5GHz Hoặc Thường Xuyên Rớt Mạng</h3>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                        Các dòng tivi Xiaomi nội địa chỉ nhận kênh sóng wifi 5GHz ở channel 36 - 48 hoặc 149 - 161. Hãy vào modem wifi nhà bạn và cố định Channel sang <strong>Channel 40 hoặc 44</strong>.
                    </p>
                    <span style="font-size:0.8rem; color:#00C853;"><i class="fas fa-thumbs-up"></i> 3,120 người đã sửa thành công</span>
                </div>

                <!-- Bài 5 -->
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <span style="font-size:0.75rem; background:rgba(171,71,188,0.15); color:#AB47BC; padding:3px 8px; border-radius:4px; font-weight:700;">CÀI ĐẶT ỨNG DỤNG</span>
                    <h3 style="font-size:1.15rem; margin:14px 0 8px; line-height:1.4;">Bị Chặn Cài File APK: Lỗi 'Ứng Dụng Không Được Phép'</h3>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                        Kích hoạt chế độ nhà phát triển bằng cách vào <em>Cài đặt &rarr; Tùy chọn thiết bị &rarr; Giới thiệu &rarr; Nhấn liên tục 7 lần vào dòng 'Bản dựng hệ điều hành'</em> rồi bật USB Debugging.
                    </p>
                    <span style="font-size:0.8rem; color:#00C853;"><i class="fas fa-thumbs-up"></i> 1,760 người đã sửa thành công</span>
                </div>

                <!-- Bài 6 -->
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <span style="font-size:0.75rem; background:rgba(255,103,0,0.15); color:var(--primary); padding:3px 8px; border-radius:4px; font-weight:700;">TIẾNG VIỆT</span>
                    <h3 style="font-size:1.15rem; margin:14px 0 8px; line-height:1.4;">Cài Giao Diện Tiếng Việt Cho Tivi Xiaomi Nội Địa Trung Quốc</h3>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                        Hướng dẫn cài Launcher Việt hóa, gỡ bỏ chữ tiếng Trung trên màn hình chính và thay bằng giao diện Android TV quốc tế trực quan, dễ bấm cho người lớn tuổi.
                    </p>
                    <span style="font-size:0.8rem; color:#00C853;"><i class="fas fa-thumbs-up"></i> 4,500 người đã sửa thành công</span>
                </div>
            </div>

            <div style="text-align:center; padding:28px; background:rgba(255,103,0,0.08); border:1px dashed var(--primary); border-radius:14px;">
                <h3 style="font-size:1.3rem; margin-bottom:8px;">Gặp Lỗi Phức Tạp Hơn?</h3>
                <p style="color:var(--text-muted); font-size:0.92rem; margin-bottom:20px;">Đừng lo lắng, kỹ thuật viên MiTV Pro sẵn sàng hỗ trợ trực tuyến qua Zalo hoặc TeamViewer bất kỳ lúc nào.</p>
                <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                    <a href="booking.php" class="btn-primary"><i class="fas fa-calendar-check"></i> Đặt Lịch Kỹ Thuật Hỗ Trợ</a>
                    <a href="speedtest.php" class="btn-outline"><i class="fas fa-gauge-high"></i> Kiểm Tra Tốc Độ Mạng</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
