<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$db = Database::getInstance();

// Xử lý cập nhật trạng thái phiếu hỗ trợ nếu có
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_status') {
    if (verify_csrf($_POST['csrf_token'] ?? '')) {
        $bId = (int)$_POST['booking_id'];
        $newStatus = trim($_POST['status']);
        $note = trim($_POST['technician_note'] ?? '');
        $upd = $db->prepare("UPDATE service_bookings SET status = :s, technician_note = :n, updated_at = CURRENT_TIMESTAMP WHERE id = :id");
        $upd->execute([':s' => $newStatus, ':n' => $note, ':id' => $bId]);
    }
}

// Thống kê tổng hợp
$stats = [
    'total_bookings' => $db->query("SELECT COUNT(*) FROM service_bookings")->fetchColumn(),
    'pending_bookings' => $db->query("SELECT COUNT(*) FROM service_bookings WHERE status = 'pending'")->fetchColumn(),
    'total_downloads' => $db->query("SELECT SUM(download_count) FROM applications")->fetchColumn() ?: 0,
    'total_apps' => $db->query("SELECT COUNT(*) FROM applications")->fetchColumn()
];

// Danh sách phiếu đặt lịch gần đây
$stmtBookings = $db->query("SELECT * FROM service_bookings ORDER BY id DESC LIMIT 15");
$recentBookings = $stmtBookings->fetchAll();

// Danh sách ứng dụng
$stmtApps = $db->query("SELECT * FROM applications ORDER BY id ASC");
$appsList = $stmtApps->fetchAll();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điều Khiển Quản Trị - MiTV Pro</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="background:#090912;">
    <!-- Admin Top Nav -->
    <div style="background:#121224; border-bottom:1px solid var(--border-subtle); padding:14px 28px; display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex; align-items:center; gap:12px;">
            <div class="brand-icon" style="width:36px; height:36px; font-size:1.1rem;"><i class="fas fa-tv"></i></div>
            <strong style="font-size:1.2rem;">MiTV Pro <span style="color:var(--primary); font-size:0.85rem; font-weight:700; background:rgba(255,103,0,0.15); padding:2px 8px; border-radius:4px;">ADMIN</span></strong>
        </div>
        <div style="display:flex; align-items:center; gap:18px;">
            <span style="font-size:0.9rem; color:var(--text-sub);"><i class="fas fa-user-circle"></i> <?php e($_SESSION['admin_name']); ?></span>
            <a href="../index.php" target="_blank" class="btn-outline" style="padding:6px 14px; font-size:0.8rem;"><i class="fas fa-arrow-up-right-from-square"></i> Xem Web</a>
            <a href="logout.php" style="color:#FF3D3D; font-size:0.88rem; font-weight:600;"><i class="fas fa-power-off"></i> Đăng Xuất</a>
        </div>
    </div>

    <div class="container" style="padding: 36px 20px;">
        <!-- Thống kê nhanh 4 chỉ số -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:20px; margin-bottom:36px;">
            <div style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:14px; padding:22px;">
                <span style="font-size:0.82rem; color:var(--text-muted); text-transform:uppercase; font-weight:700;">Tổng Phiếu Hỗ Trợ</span>
                <div style="font-size:2.2rem; font-weight:900; color:#fff; margin-top:6px;"><?php echo number_format($stats['total_bookings']); ?></div>
            </div>

            <div style="background:var(--bg-card); border:1px solid #FFC107; border-radius:14px; padding:22px;">
                <span style="font-size:0.82rem; color:#FFC107; text-transform:uppercase; font-weight:700;">Phiếu Chờ Xử Lý</span>
                <div style="font-size:2.2rem; font-weight:900; color:#FFC107; margin-top:6px;"><?php echo number_format($stats['pending_bookings']); ?></div>
            </div>

            <div style="background:var(--bg-card); border:1px solid var(--border-primary); border-radius:14px; padding:22px;">
                <span style="font-size:0.82rem; color:var(--primary); text-transform:uppercase; font-weight:700;">Lượt Tải Ứng Dụng</span>
                <div style="font-size:2.2rem; font-weight:900; color:var(--primary); margin-top:6px;"><?php echo number_format($stats['total_downloads']); ?></div>
            </div>

            <div style="background:var(--bg-card); border:1px solid #00C853; border-radius:14px; padding:22px;">
                <span style="font-size:0.82rem; color:#00C853; text-transform:uppercase; font-weight:700;">Ứng Dụng Trong Kho</span>
                <div style="font-size:2.2rem; font-weight:900; color:#00C853; margin-top:6px;"><?php echo number_format($stats['total_apps']); ?></div>
            </div>
        </div>

        <!-- Bảng danh sách phiếu đặt lịch -->
        <div style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:16px; padding:28px; margin-bottom:36px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <h3 style="font-size:1.3rem;"><i class="fas fa-list-check" style="color:var(--primary);"></i> Danh Sách Phiếu Cài Đặt Từ Xa Mới Nhất</h3>
                <span style="font-size:0.82rem; color:var(--text-muted);">Hiển thị 15 phiếu gần nhất</span>
            </div>

            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; font-size:0.9rem; text-align:left;">
                    <thead>
                        <tr style="border-bottom:1px solid var(--border-subtle); color:var(--text-muted);">
                            <th style="padding:10px;">Mã Phiếu</th>
                            <th style="padding:10px;">Khách Hàng</th>
                            <th style="padding:10px;">SĐT / Zalo</th>
                            <th style="padding:10px;">Model Tivi</th>
                            <th style="padding:10px;">Gói Cài</th>
                            <th style="padding:10px;">Trạng Thái</th>
                            <th style="padding:10px;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentBookings)): ?>
                            <tr>
                                <td colspan="7" style="text-align:center; padding:24px; color:var(--text-muted);">Chưa có yêu cầu đặt lịch nào trong hệ thống.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentBookings as $b): ?>
                                <tr style="border-bottom:1px solid rgba(255,255,255,0.04);">
                                    <td style="padding:12px 10px; font-family:monospace; color:var(--primary); font-weight:700;">
                                        <a href="../track.php?code=<?php e($b['booking_code']); ?>" target="_blank" style="text-decoration:underline;"><?php e($b['booking_code']); ?></a>
                                    </td>
                                    <td style="padding:12px 10px; font-weight:600;"><?php e($b['customer_name']); ?></td>
                                    <td style="padding:12px 10px;"><?php e($b['customer_phone']); ?></td>
                                    <td style="padding:12px 10px;"><?php e($b['tv_model']); ?></td>
                                    <td style="padding:12px 10px; color:var(--text-sub);"><?php e($b['service_package']); ?></td>
                                    <td style="padding:12px 10px;">
                                        <span style="font-size:0.75rem; padding:3px 8px; border-radius:4px; font-weight:700; background:rgba(255,103,0,0.12); color:var(--primary);">
                                            <?php e($b['status']); ?>
                                        </span>
                                    </td>
                                    <td style="padding:12px 10px;">
                                        <form method="POST" action="index.php" style="display:flex; gap:6px;">
                                            <input type="hidden" name="csrf_token" value="<?php e($_SESSION['csrf_token']); ?>">
                                            <input type="hidden" name="action" value="update_status">
                                            <input type="hidden" name="booking_id" value="<?php echo $b['id']; ?>">
                                            <select name="status" style="background:#090913; color:#fff; border:1px solid var(--border-subtle); border-radius:4px; padding:4px; font-size:0.8rem;">
                                                <option value="pending" <?php echo $b['status'] === 'pending' ? 'selected' : ''; ?>>Chờ xử lý</option>
                                                <option value="confirmed" <?php echo $b['status'] === 'confirmed' ? 'selected' : ''; ?>>Đã xác nhận</option>
                                                <option value="processing" <?php echo $b['status'] === 'processing' ? 'selected' : ''; ?>>Đang cài đặt</option>
                                                <option value="completed" <?php echo $b['status'] === 'completed' ? 'selected' : ''; ?>>Hoàn tất</option>
                                                <option value="cancelled" <?php echo $b['status'] === 'cancelled' ? 'selected' : ''; ?>>Hủy</option>
                                            </select>
                                            <button type="submit" style="background:var(--primary); color:#fff; border:none; border-radius:4px; padding:4px 8px; cursor:pointer; font-size:0.8rem;">Lưu</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bảng quản lý kho ứng dụng -->
        <div style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:16px; padding:28px;">
            <h3 style="font-size:1.3rem; margin-bottom:20px;"><i class="fas fa-box-open" style="color:var(--primary);"></i> Quản Lý Kho Ứng Dụng & Mã Downloader</h3>
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; font-size:0.9rem; text-align:left;">
                    <thead>
                        <tr style="border-bottom:1px solid var(--border-subtle); color:var(--text-muted);">
                            <th style="padding:10px;">Tên Ứng Dụng</th>
                            <th style="padding:10px;">Phiên Bản</th>
                            <th style="padding:10px;">File APK</th>
                            <th style="padding:10px;">Mã Downloader</th>
                            <th style="padding:10px;">Lượt Tải</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appsList as $a): ?>
                            <tr style="border-bottom:1px solid rgba(255,255,255,0.04);">
                                <td style="padding:12px 10px; font-weight:700;"><i class="fas <?php e($a['icon_class']); ?>" style="color:var(--primary); margin-right:8px;"></i> <?php e($a['app_name']); ?></td>
                                <td style="padding:12px 10px;"><?php e($a['version']); ?></td>
                                <td style="padding:12px 10px; font-family:monospace;"><?php e($a['file_name']); ?> (<?php echo $a['file_size_mb']; ?> MB)</td>
                                <td style="padding:12px 10px;"><strong style="color:var(--primary); font-family:monospace;"><?php e($a['downloader_code']); ?></strong></td>
                                <td style="padding:12px 10px; color:#00C853; font-weight:700;"><?php echo number_format($a['download_count']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
