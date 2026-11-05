<?php
$pageTitle = 'Đăng Ký Đặt Lịch Cài Đặt Tivi Từ Xa - MiTV Pro';
$pageDesc = 'Đăng ký dịch vụ hỗ trợ cài đặt tivi Xiaomi từ xa tận nhà. Chọn thời gian mong muốn, nhận mã theo dõi tiến độ xử lý trực tiếp.';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/includes/db.php';

$successMessage = '';
$errorMessage = '';
$generatedCode = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
    if (!verify_csrf($csrf)) {
        $errorMessage = 'Mã xác thực bảo mật không hợp lệ hoặc phiên làm việc đã hết hạn.';
    } else {
        $name = isset($_POST['customer_name']) ? trim(strip_tags($_POST['customer_name'])) : '';
        $phone = isset($_POST['customer_phone']) ? trim(strip_tags($_POST['customer_phone'])) : '';
        $model = isset($_POST['tv_model']) ? trim(strip_tags($_POST['tv_model'])) : '';
        $package = isset($_POST['service_package']) ? trim(strip_tags($_POST['service_package'])) : 'Trọn Gói 199k';
        $timePref = isset($_POST['preferred_time']) ? trim(strip_tags($_POST['preferred_time'])) : 'Càng sớm càng tốt';
        $note = isset($_POST['note']) ? trim(strip_tags($_POST['note'])) : '';

        if (empty($name) || empty($phone) || empty($model)) {
            $errorMessage = 'Vui lòng điền đầy đủ Họ tên, Số điện thoại/Zalo và Model tivi.';
        } else {
            try {
                $db = Database::getInstance();
                $generatedCode = 'MTV-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));

                $stmt = $db->prepare("
                    INSERT INTO service_bookings (booking_code, customer_name, customer_phone, tv_model, service_package, preferred_time, note, status)
                    VALUES (:code, :name, :phone, :model, :package, :timepref, :note, 'pending')
                ");
                $stmt->execute([
                    ':code' => $generatedCode,
                    ':name' => $name,
                    ':phone' => $phone,
                    ':model' => $model,
                    ':package' => $package,
                    ':timepref' => $timePref,
                    ':note' => $note
                ]);

                $successMessage = 'Đăng ký thành công! Kỹ thuật viên sẽ liên hệ trong 5-10 phút.';
            } catch (Exception $e) {
                error_log("Booking error: " . $e->getMessage());
                $errorMessage = 'Có lỗi xảy ra trong quá trình lưu dữ liệu. Xin vui lòng thử lại.';
            }
        }
    }
}
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 820px;">
            <div style="text-align:center; margin-bottom: 32px;">
                <span class="card-tag"><i class="fas fa-calendar-check"></i> ĐẶT LỊCH HỖ TRỢ TRỰC TUYẾN</span>
                <h1 style="font-size:2.2rem; margin: 10px 0;">Đăng Ký Cài Đặt Tivi Từ Xa</h1>
                <p style="color:var(--text-muted); font-size:0.95rem;">Không cần mang máy đến cửa hàng. Kỹ thuật viên kết nối qua mạng hỗ trợ bạn tận nơi.</p>
            </div>

            <?php if (!empty($successMessage)): ?>
                <div style="background:rgba(0,200,83,0.12); border:1px solid #00C853; border-radius:12px; padding:24px; margin-bottom:28px; text-align:center;">
                    <div style="font-size:2.5rem; color:#00C853; margin-bottom:10px;"><i class="fas fa-circle-check"></i></div>
                    <h3 style="color:#00C853; font-size:1.4rem; margin-bottom:6px;"><?php e($successMessage); ?></h3>
                    <p style="color:var(--text-sub); margin-bottom:14px;">Mã phiếu hỗ trợ của bạn là: <strong style="color:var(--primary); font-size:1.3rem; letter-spacing:2px; font-family:monospace;"><?php e($generatedCode); ?></strong></p>
                    <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                        <a href="track.php?code=<?php e($generatedCode); ?>" class="btn-primary"><i class="fas fa-magnifying-glass"></i> Tra Cứu Tiến Độ Phiếu</a>
                        <a href="index.php" class="btn-outline">Về Trang Chủ</a>
                    </div>
                </div>
            <?php else: ?>

                <?php if (!empty($errorMessage)): ?>
                    <div style="background:rgba(255,61,61,0.12); border:1px solid #FF3D3D; color:#FF8585; border-radius:10px; padding:14px; margin-bottom:24px;">
                        <i class="fas fa-circle-exclamation"></i> <?php e($errorMessage); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="booking.php">
                    <input type="hidden" name="csrf_token" value="<?php e($_SESSION['csrf_token']); ?>">

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                        <div class="form-group">
                            <label class="form-label" for="cname">Họ & Tên Quý Khách: <span style="color:var(--primary);">*</span></label>
                            <input type="text" id="cname" name="customer_name" class="form-control" placeholder="Ví dụ: Nguyễn Văn An" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="cphone">Số Điện Thoại / Zalo: <span style="color:var(--primary);">*</span></label>
                            <input type="tel" id="cphone" name="customer_phone" class="form-control" placeholder="Ví dụ: 0912 345 678" required>
                        </div>
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                        <div class="form-group">
                            <label class="form-label" for="cmodel">Dòng / Model Tivi Xiaomi: <span style="color:var(--primary);">*</span></label>
                            <input type="text" id="cmodel" name="tv_model" class="form-control" placeholder="Ví dụ: EA55, A Pro 43, Mi TV 4S..." required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="cpackage">Gói Dịch Vụ Muốn Cài:</label>
                            <select id="cpackage" name="service_package" class="form-control" style="background:#090913;">
                                <option value="Gói Trọn Gói 199k" selected>🔥 Gói Trọn Gói (199k - Khuyên dùng)</option>
                                <option value="Gói Cơ Bản 99k">Gói Cơ Bản (99k - Cài 1 ứng dụng)</option>
                                <option value="Gói VIP Trọn Đời 299k">Gói VIP Trọn Đời (299k - Hỗ trợ vĩnh viễn)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="ctime">Khung Giờ Hỗ Trợ Thuận Tiện Nhất:</label>
                        <select id="ctime" name="preferred_time" class="form-control" style="background:#090913;">
                            <option value="Hỗ trợ ngay bây giờ">Hỗ trợ ngay bây giờ</option>
                            <option value="Buổi sáng (08h00 - 12h00)">Buổi sáng (08h00 - 12h00)</option>
                            <option value="Buổi chiều (13h30 - 18h00)">Buổi chiều (13h30 - 18h00)</option>
                            <option value="Buổi tối (19h00 - 22h00)">Buổi tối (19h00 - 22h00)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="cnote">Ghi Chú Thêm Hoặc Lỗi Đang Gặp (Không bắt buộc):</label>
                        <textarea id="cnote" name="note" class="form-control" rows="3" placeholder="Ví dụ: Tivi mở YouTube hay bị văng ra ngoài, tivi mở máy có nhiều quảng cáo..."></textarea>
                    </div>

                    <div style="background:rgba(255,103,0,0.08); border-left:4px solid var(--primary); padding:16px; border-radius:0 10px 10px 0; margin-bottom:24px; font-size:0.88rem; color:var(--text-sub);">
                        <i class="fas fa-lock" style="color:var(--primary);"></i> 
                        <strong>Cam kết bảo mật:</strong> Thông tin của quý khách được mã hóa và chỉ dùng cho mục đích kỹ thuật viên liên hệ hỗ trợ. Không chia sẻ cho bên thứ ba.
                    </div>

                    <button type="submit" class="btn-primary" style="width:100%; justify-content:center; padding:15px; font-size:1.05rem;">
                        <i class="fas fa-paper-plane"></i> Gửi Yêu Cầu Cài Đặt Ngay
                    </button>
                </form>
            <?php endif; ?>

            <div style="margin-top:28px; text-align:center;">
                <span style="color:var(--text-muted); font-size:0.9rem;">Đã có phiếu hẹn trước đó?</span>
                <a href="track.php" style="color:var(--primary); font-weight:700; margin-left:6px; font-size:0.9rem;">
                    Tra cứu tiến độ phiếu tại đây <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
