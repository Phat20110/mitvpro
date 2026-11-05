<?php
$pageTitle = 'Kiểm Tra Tương Thích Model Tivi Xiaomi Online - MiTV Pro';
$pageDesc = 'Công cụ tra cứu thông số kỹ thuật, cấu hình RAM, chip và đề xuất bản phần mềm tối ưu tốt nhất cho từng model Tivi Xiaomi.';
require_once __DIR__ . '/header.php';
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 900px;">
            <div style="text-align:center; margin-bottom: 36px;">
                <span class="card-tag"><i class="fas fa-microchip"></i> CÔNG CỤ TRỰC TUYẾN MIỄN PHÍ</span>
                <h1 style="font-size:2.2rem; margin: 12px 0;">Tra Cứu Cấu Hình & Tối Ưu Theo Model</h1>
                <p style="color:var(--text-muted); max-width:600px; margin:0 auto;">
                    Nhập tên hoặc mã model Tivi Xiaomi đang sử dụng để nhận phân tích cấu hình thực tế và gợi ý bộ ứng dụng nhẹ nhất.
                </p>
            </div>

            <!-- Tool Checker Card -->
            <div class="checker-card">
                <form id="modelCheckerForm">
                    <div class="form-group">
                        <label class="form-label" for="tvModelInput">Nhập Tên Hoặc Mã Model Tivi Xiaomi Của Bạn:</label>
                        <input type="text" id="tvModelInput" class="form-control" placeholder="Ví dụ: EA55, A Pro 43, P1 55 inch, Mi TV 4S, Redmi MAX 86..." required>
                        <small style="color:var(--text-muted); display:block; margin-top:6px;">
                            <i class="fas fa-info-circle"></i> Bạn có thể xem mã model ở tem dán phía sau lưng tivi hoặc trong <em>Cài đặt &rarr; Giới thiệu thiết bị</em>.
                        </small>
                    </div>

                    <div style="display:flex; gap:10px; margin-bottom: 24px; flex-wrap:wrap;">
                        <span style="font-size:0.82rem; color:var(--text-muted);">Gợi ý tìm nhanh:</span>
                        <a href="javascript:void(0)" onclick="document.getElementById('tvModelInput').value='Xiaomi EA55'; document.getElementById('modelCheckerForm').dispatchEvent(new Event('submit'));" style="font-size:0.82rem; color:var(--primary); text-decoration:underline;">EA55</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('tvModelInput').value='Xiaomi TV A Pro'; document.getElementById('modelCheckerForm').dispatchEvent(new Event('submit'));" style="font-size:0.82rem; color:var(--primary); text-decoration:underline;">A Pro 4K</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('tvModelInput').value='Mi TV 4S'; document.getElementById('modelCheckerForm').dispatchEvent(new Event('submit'));" style="font-size:0.82rem; color:var(--primary); text-decoration:underline;">Mi TV 4S</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('tvModelInput').value='Redmi MAX'; document.getElementById('modelCheckerForm').dispatchEvent(new Event('submit'));" style="font-size:0.82rem; color:var(--primary); text-decoration:underline;">Redmi MAX</a>
                    </div>

                    <button type="submit" class="btn-primary" style="width:100%; justify-content:center; padding:14px; font-size:1rem;">
                        <i class="fas fa-magnifying-glass"></i> Phân Tích & Gợi Ý Tối Ưu
                    </button>
                </form>

                <!-- Kết quả hiển thị động -->
                <div id="checkerResult" class="result-card"></div>
            </div>

            <div style="margin-top:40px; padding:24px; background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px;">
                <h3 style="font-size:1.15rem; color:var(--primary); margin-bottom:12px;">
                    <i class="fas fa-lightbulb"></i> Bạn Có Biết?
                </h3>
                <p style="font-size:0.92rem; color:var(--text-sub); line-height:1.7;">
                    Phần lớn các dòng tivi Xiaomi nội địa chỉ được trang bị 1.5GB hoặc 2GB RAM. Trong khi đó, các tiến trình quảng cáo và cửa hàng ứng dụng mặc định của Xiaomi đã chiếm dụng đến 60-70% lượng RAM ngay từ khi mở máy. Do đó, việc tắt bớt ứng dụng chạy ngầm bằng công cụ <strong>MiTV Optimizer</strong> là giải pháp thiết yếu để tivi hoạt động bền bỉ, không bị giật hình khi xem video 4K.
                </p>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
