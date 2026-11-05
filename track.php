<?php
$pageTitle = 'Tra Cứu Tiến Độ Phiếu Cài Đặt Tivi - MiTV Pro';
$pageDesc = 'Tra cứu tình trạng tiếp nhận, kỹ thuật viên phụ trách và kết quả xử lý phiếu đặt lịch cài đặt Tivi Xiaomi của bạn.';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/includes/db.php';

$code = isset($_GET['code']) ? strtoupper(trim(strip_tags($_GET['code']))) : '';
$booking = null;
$searched = false;

if (!empty($code)) {
    $searched = true;
    try {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM service_bookings WHERE booking_code = :code LIMIT 1");
        $stmt->execute([':code' => $code]);
        $booking = $stmt->fetch();
    } catch (Exception $e) {
        error_log("Track query error: " . $e->getMessage());
    }
}
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 820px;">
            <div style="text-align:center; margin-bottom: 32px;">
                <span class="card-tag"><i class="fas fa-satellite-dish"></i> THEO DÕI THỜI GIAN THỰC</span>
                <h1 style="font-size:2.2rem; margin: 10px 0;">Tra Cứu Phiếu Hỗ Trợ Kỹ Thuật</h1>
                <p style="color:var(--text-muted); font-size:0.95rem;">Nhập mã phiếu (Ví dụ: MTV-A1B2C3) nhận được khi đăng ký để xem trạng thái xử lý.</p>
            </div>

            <form method="GET" action="track.php" style="margin-bottom: 36px;">
                <div style="display:flex; gap:12px;">
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã phiếu (Ví dụ: MTV-123456)..." value="<?php e($code); ?>" required style="text-transform:uppercase; font-family:monospace; font-size:1.1rem; letter-spacing:1px;">
                    <button type="submit" class="btn-primary" style="white-space:nowrap; padding:12px 24px;">
                        <i class="fas fa-magnifying-glass"></i> Tra Cứu
                    </button>
                </div>
            </form>

            <?php if ($searched): ?>
                <?php if ($booking): ?>
                    <?php
                        $statusBadge = '';
                        $statusText = '';
                        $statusStep = 1;
                        switch ($booking['status']) {
                            case 'pending':
                                $statusBadge = 'background:rgba(255,193,7,0.15); color:#FFC107; border:1px solid #FFC107;';
                                $statusText = 'Đang chờ điều phối kỹ thuật viên';
                                $statusStep = 1;
                                break;
                            case 'confirmed':
                                $statusBadge = 'background:rgba(33,150,243,0.15); color:#2196F3; border:1px solid #2196F3;';
                                $statusText = 'Kỹ thuật viên đã tiếp nhận & chuẩn bị gọi xác nhận';
                                $statusStep = 2;
                                break;
                            case 'processing':
                                $statusBadge = 'background:rgba(255,103,0,0.15); color:#FF6700; border:1px solid #FF6700;';
                                $statusText = 'Đang tiến hành kết nối cài đặt từ xa trên Tivi';
                                $statusStep = 3;
                                break;
                            case 'completed':
                                $statusBadge = 'background:rgba(0,200,83,0.15); color:#00C853; border:1px solid #00C853;';
                                $statusText = 'Cài đặt hoàn tất & Đang trong thời hạn bảo hành';
                                $statusStep = 4;
                                break;
                            default:
                                $statusBadge = 'background:rgba(255,61,61,0.15); color:#FF3D3D; border:1px solid #FF3D3D;';
                                $statusText = 'Đã hủy phiếu';
                                $statusStep = 0;
                        }
                    ?>
                    <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:14px; padding:28px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:20px; border-bottom:1px solid var(--border-subtle); padding-bottom:16px;">
                            <div>
                                <span style="font-size:0.85rem; color:var(--text-muted);">Mã Phiếu:</span>
                                <h3 style="font-size:1.5rem; font-family:monospace; color:var(--primary);"><?php e($booking['booking_code']); ?></h3>
                            </div>
                            <div>
                                <span style="padding:6px 14px; border-radius:50px; font-weight:700; font-size:0.85rem; <?php echo $statusBadge; ?>">
                                    <i class="fas fa-circle-dot"></i> <?php e($statusText); ?>
                                </span>
                            </div>
                        </div>

                        <!-- Tiến trình 4 bước -->
                        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:10px; margin:28px 0; text-align:center;">
                            <div style="opacity:<?php echo ($statusStep >= 1) ? '1' : '0.35'; ?>;">
                                <div style="width:36px; height:36px; border-radius:50%; background:<?php echo ($statusStep >= 1) ? 'var(--primary)' : '#222'; ?>; color:#fff; display:flex; align-items:center; justify-content:center; margin:0 auto 8px; font-weight:700;">1</div>
                                <span style="font-size:0.75rem; color:var(--text-sub);">Tiếp Nhận</span>
                            </div>
                            <div style="opacity:<?php echo ($statusStep >= 2) ? '1' : '0.35'; ?>;">
                                <div style="width:36px; height:36px; border-radius:50%; background:<?php echo ($statusStep >= 2) ? 'var(--primary)' : '#222'; ?>; color:#fff; display:flex; align-items:center; justify-content:center; margin:0 auto 8px; font-weight:700;">2</div>
                                <span style="font-size:0.75rem; color:var(--text-sub);">Xác Nhận</span>
                            </div>
                            <div style="opacity:<?php echo ($statusStep >= 3) ? '1' : '0.35'; ?>;">
                                <div style="width:36px; height:36px; border-radius:50%; background:<?php echo ($statusStep >= 3) ? 'var(--primary)' : '#222'; ?>; color:#fff; display:flex; align-items:center; justify-content:center; margin:0 auto 8px; font-weight:700;">3</div>
                                <span style="font-size:0.75rem; color:var(--text-sub);">Cài Đặt Từ Xa</span>
                            </div>
                            <div style="opacity:<?php echo ($statusStep >= 4) ? '1' : '0.35'; ?>;">
                                <div style="width:36px; height:36px; border-radius:50%; background:<?php echo ($statusStep >= 4) ? '#00C853' : '#222'; ?>; color:#fff; display:flex; align-items:center; justify-content:center; margin:0 auto 8px; font-weight:700;">4</div>
                                <span style="font-size:0.75rem; color:var(--text-sub);">Nghiệm Thu</span>
                            </div>
                        </div>

                        <!-- Chi tiết phiếu -->
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; font-size:0.92rem;">
                            <div>
                                <span style="color:var(--text-muted);">Khách hàng:</span>
                                <strong style="display:block; color:#fff;"><?php e($booking['customer_name']); ?></strong>
                            </div>
                            <div>
                                <span style="color:var(--text-muted);">Model tivi:</span>
                                <strong style="display:block; color:#fff;"><?php e($booking['tv_model']); ?></strong>
                            </div>
                            <div>
                                <span style="color:var(--text-muted);">Gói dịch vụ:</span>
                                <strong style="display:block; color:var(--primary);"><?php e($booking['service_package']); ?></strong>
                            </div>
                            <div>
                                <span style="color:var(--text-muted);">Thời gian tạo:</span>
                                <strong style="display:block; color:#fff;"><?php e($booking['created_at']); ?></strong>
                            </div>
                        </div>

                        <?php if (!empty($booking['technician_note'])): ?>
                            <div style="margin-top:20px; padding:14px; background:rgba(255,103,0,0.08); border-radius:8px; border:1px dashed var(--border-primary);">
                                <span style="font-size:0.85rem; color:var(--primary); font-weight:700;"><i class="fas fa-clipboard-user"></i> Ghi chú từ kỹ thuật viên:</span>
                                <p style="color:var(--text-sub); font-size:0.9rem; margin-top:4px;"><?php e($booking['technician_note']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div style="background:rgba(255,61,61,0.1); border:1px solid #FF3D3D; color:#FF8585; border-radius:12px; padding:24px; text-align:center;">
                        <i class="fas fa-triangle-exclamation" style="font-size:2rem; margin-bottom:10px;"></i>
                        <h4>Không tìm thấy phiếu nào có mã: <?php e($code); ?></h4>
                        <p style="font-size:0.9rem; color:var(--text-muted); margin-top:6px;">Vui lòng kiểm tra lại tính chính xác của mã số hoặc liên hệ Zalo hỗ trợ để được kiểm tra thủ công.</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div style="margin-top:32px; text-align:center;">
                <a href="booking.php" class="btn-primary"><i class="fas fa-plus"></i> Đăng Ký Phiếu Mới</a>
                <a href="index.php" class="btn-outline" style="margin-left:12px;">Về Trang Chủ</a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
