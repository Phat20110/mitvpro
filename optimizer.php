<?php
$pageTitle = 'Phần Mềm MiTV Optimizer Pro - Tối Ưu RAM & Gỡ Rác Tivi Xiaomi';
$pageDesc = 'Tải miễn phí phần mềm chuyên dụng giải phóng RAM, gỡ bỏ ứng dụng chạy ngầm, xoá cache và tăng tốc 200% cho Tivi Xiaomi Android TV.';
require_once __DIR__ . '/header.php';
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 1040px;">
            <div style="text-align:center; margin-bottom: 36px;">
                <span class="card-tag"><i class="fas fa-rocket"></i> PHIÊN BẢN V2.5.0 STABLE</span>
                <h1 style="font-size:2.4rem; margin: 12px 0;">MiTV Optimizer Pro cho Xiaomi TV</h1>
                <p style="color:var(--text-muted); max-width:680px; margin:0 auto;">
                    Phần mềm được tinh chỉnh đặc thù theo kiến trúc chip Amlogic, MediaTek trên các dòng Tivi Xiaomi (EA, A Pro, Redmi TV, Mi TV 4/5/6) giúp khắc phục triệt để hiện tượng giật đơ sau thời gian dài sử dụng.
                </p>
            </div>

            <!-- Download Hero Box -->
            <div class="optimizer-banner" style="margin-bottom: 40px;">
                <div class="opt-details">
                    <span style="font-size:0.8rem; background:rgba(0,200,83,0.15); color:#00C853; padding:4px 10px; border-radius:4px; font-weight:700;">
                        <i class="fas fa-check-shield"></i> 100% MIỄN PHÍ &bull; KHÔNG QUẢNG CÁO
                    </span>
                    <h3 style="font-size:1.8rem; margin: 14px 0 10px;">Tải Ứng Dụng Ngay Về Tivi</h3>
                    <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.7;">
                        Dung lượng gói cài đặt chỉ <strong>4.8 MB</strong>. Tương thích Android TV 9.0, 10.0, 11.0, Google TV và hệ điều hành Xiaomi HyperOS for TV.
                    </p>
                    
                    <div style="display:flex; gap:16px; margin-top:24px; flex-wrap:wrap;">
                        <a href="api/download.php?app=optimizer" class="btn-primary" style="padding:14px 28px; font-size:1rem;">
                            <i class="fas fa-download"></i> Tải File APK (Trực Tiếp)
                        </a>
                        <button class="btn-code" onclick="copyDownloaderCode('<?php e(APP_DOWNLOADER_CODE); ?>')" style="padding:14px 22px; font-size:0.95rem;">
                            <i class="fas fa-barcode"></i> Mã Downloader: <?php e(APP_DOWNLOADER_CODE); ?>
                        </button>
                    </div>
                </div>

                <div class="opt-card-mockup">
                    <div style="font-size:3rem; color:var(--primary); margin-bottom:12px;">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <h4 style="font-size:1.2rem; margin-bottom:6px;">MiTV Optimizer</h4>
                    <p style="font-size:0.85rem; color:var(--text-muted); margin-bottom:14px;">Bản dựng cho Android ARM / ARM64</p>
                    <div style="font-size:0.8rem; color:#00C853; background:rgba(0,200,83,0.1); padding:8px; border-radius:6px;">
                        <i class="fas fa-shield-virus"></i> Đã quét virus qua VirusTotal (0/72 cảnh báo)
                    </div>
                </div>
            </div>

            <!-- Tính Năng Nổi Bật -->
            <h2 style="font-size:1.6rem; margin-bottom: 24px;"><i class="fas fa-bolt" style="color:var(--primary);"></i> 4 Tính Năng Cốt Lõi Của MiTV Optimizer</h2>

            <div class="features-grid" style="margin-bottom: 40px;">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-memory"></i></div>
                    <h3>Giải Phóng RAM Tức Thì</h3>
                    <p>Dọn dẹp các ứng dụng rác chạy ẩn, trả lại tới 500MB - 1GB RAM trống cho tivi chuyển kênh và mở YouTube siêu mượt.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-snowflake"></i></div>
                    <h3>Đóng Băng Dịch Vụ Thu Thập Ngầm</h3>
                    <p>Khóa các tiến trình quảng cáo mặc định của Xiaomi mà không cần can thiệp Root máy, giúp máy mát hơn và tăng tuổi thọ chip.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-trash-can"></i></div>
                    <h3>Quét Dọn Bộ Nhớ Đệm (Cache)</h3>
                    <p>Xóa sạch các file dữ liệu tạm thời sinh ra trong quá trình xem phim online, giải quyết tận gốc lỗi "Bộ nhớ tivi sắp đầy".</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-power-off"></i></div>
                    <h3>Quản Lý Khởi Động (Auto-Start)</h3>
                    <p>Ngăn chặn các ứng dụng tự ý khởi động cùng tivi khi vừa bật nguồn, giảm thời gian khởi động từ 45s xuống chỉ còn 12s.</p>
                </div>
            </div>

            <!-- Tính Năng Mới: Gỡ Bỏ Vĩnh Viễn App Rác & Trạm Chặn QC Cả Nhà -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:40px;">
                <!-- Feature 1: Gỡ Bỏ Vĩnh Viễn App Rác -->
                <div style="background:linear-gradient(135deg, #1b172a 0%, #121020 100%); border:2px solid rgba(255,59,48,0.4); border-radius:16px; padding:26px;">
                    <span style="font-size:0.75rem; background:rgba(255,59,48,0.2); color:#FF3B30; padding:4px 10px; border-radius:6px; font-weight:700;">
                        <i class="fas fa-trash-can"></i> TÍNH NĂNG ĐỘC QUYỀN
                    </span>
                    <h3 style="font-size:1.35rem; margin:14px 0 8px; color:#fff;">Gỡ Bỏ Vĩnh Viễn App Rác Xiaomi</h3>
                    <p style="color:var(--text-muted); font-size:0.9rem; line-height:1.7; margin-bottom:18px;">
                        Không chỉ đóng băng tạm thời, MiTV Optimizer sử dụng lệnh hạt nhân <code style="color:#FF3B30; background:rgba(0,0,0,0.3); padding:2px 6px; border-radius:4px;">pm uninstall -k --user 0</code> gỡ sạch triệt để các ứng dụng rác nội địa Trung Quốc mà không cần root tivi:
                    </p>
                    <ul style="color:var(--text-sub); font-size:0.88rem; line-height:1.8; padding-left:18px; margin-bottom:0;">
                        <li>Xóa Xiaomi App Mall, Mi Pay, Game Center, Mi Video rác.</li>
                        <li>Giải phóng 2GB - 4GB bộ nhớ trong (ROM) cho tivi.</li>
                        <li>Đảm bảo RAM hệ thống duy trì ở mức <strong>dưới 750MB</strong> (cực mượt).</li>
                    </ul>
                </div>

                <!-- Feature 2: Biến Tivi Thành Trạm Chặn Quảng Cáo Cả Nhà (Pi-Hole TV) -->
                <div style="background:linear-gradient(135deg, #131b2e 0%, #0d1222 100%); border:2px solid rgba(0,180,216,0.4); border-radius:16px; padding:26px;">
                    <span style="font-size:0.75rem; background:rgba(0,180,216,0.2); color:#00B4D8; padding:4px 10px; border-radius:6px; font-weight:700;">
                        <i class="fas fa-network-wired"></i> CÔNG NGHỆ RASPBERRY PI
                    </span>
                    <h3 style="font-size:1.35rem; margin:14px 0 8px; color:#fff;">Biến Tivi Thành Trạm Chặn QC Cả Nhà</h3>
                    <p style="color:var(--text-muted); font-size:0.9rem; line-height:1.7; margin-bottom:18px;">
                        Hoạt động hoàn toàn tương tự dự án <strong>Pi-hole trên Raspberry Pi</strong>: Tivi Xiaomi của bạn sẽ trở thành một máy chủ DNS lọc quảng cáo cục bộ cho toàn bộ mạng gia đình:
                    </p>
                    <ul style="color:var(--text-sub); font-size:0.88rem; line-height:1.8; padding-left:18px; margin-bottom:0;">
                        <li>Toàn bộ điện thoại, máy tính, iPad bắt Wi-Fi đều tự động sạch bóng quảng cáo.</li>
                        <li>Chặn triệt để tên miền quảng cáo, banner độc hại và website theo dõi.</li>
                        <li>Tốc độ phân giải DNS siêu tốc (< 5ms) qua lõi Native Rust Engine.</li>
                    </ul>
                </div>
            </div>

            <!-- Hướng Dẫn Cài Đặt -->
            <h2 style="font-size:1.6rem; margin-bottom: 18px;"><i class="fas fa-list-ol" style="color:var(--primary);"></i> 2 Cách Cài Đặt Lên Tivi Xiaomi Đơn Giản Nhất</h2>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:40px;">
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <h3 style="font-size:1.2rem; color:var(--primary); margin-bottom:12px;">
                        <i class="fas fa-wifi"></i> Cách 1: Tải qua ứng dụng Downloader (Khuyên dùng)
                    </h3>
                    <ol style="padding-left:20px; font-size:0.92rem; color:var(--text-sub); line-height:1.8;">
                        <li>Vào kho ứng dụng trên tivi, cài app <strong>Downloader</strong>.</li>
                        <li>Mở Downloader, nhập mã: <strong style="color:var(--primary);"><?php e(APP_DOWNLOADER_CODE); ?></strong></li>
                        <li>Bấm <strong>Go</strong> và chờ 10 giây để tải và cài đặt tự động.</li>
                    </ol>
                </div>

                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:24px;">
                    <h3 style="font-size:1.2rem; color:var(--primary); margin-bottom:12px;">
                        <i class="fas fa-usb"></i> Cách 2: Tải về máy tính và cài qua USB
                    </h3>
                    <ol style="padding-left:20px; font-size:0.92rem; color:var(--text-sub); line-height:1.8;">
                        <li>Bấm nút <strong>Tải File APK</strong> bên trên về máy tính hoặc điện thoại.</li>
                        <li>Chép file APK vào USB rồi cắm vào cổng USB trên Tivi.</li>
                        <li>Mở trình quản lý file trên tivi (File Manager) &rarr; chọn file APK để cài.</li>
                    </ol>
                </div>
            </div>

            <div style="text-align:center;">
                <a href="index.php" class="btn-outline"><i class="fas fa-arrow-left"></i> Quay Lại Trang Chủ</a>
                <a href="<?php e(APP_ZALO); ?>" target="_blank" class="btn-primary" style="margin-left:12px;"><i class="fas fa-headset"></i> Yêu Cầu Kỹ Thuật Hỗ Trợ Cài Đặt Hộ</a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
