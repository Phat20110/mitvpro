<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/db.php';

$error = '';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
    if (!verify_csrf($csrf)) {
        $error = 'Phiên làm việc không hợp lệ.';
    } else {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (empty($username) || empty($password)) {
            $error = 'Vui lòng nhập tài khoản và mật khẩu.';
        } else {
            try {
                $db = Database::getInstance();
                $stmt = $db->prepare("SELECT * FROM admins WHERE username = :u LIMIT 1");
                $stmt->execute([':u' => $username]);
                $admin = $stmt->fetch();

                if ($admin && password_verify($password, $admin['password_hash'])) {
                    // Đăng nhập thành công, tái tạo ID phiên để chống session fixation
                    session_regenerate_id(true);
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_user'] = $admin['username'];
                    $_SESSION['admin_name'] = $admin['full_name'];

                    // Cập nhật thời gian đăng nhập
                    $upd = $db->prepare("UPDATE admins SET last_login = CURRENT_TIMESTAMP WHERE id = :id");
                    $upd->execute([':id' => $admin['id']]);

                    header('Location: index.php');
                    exit;
                } else {
                    $error = 'Tài khoản hoặc mật khẩu không chính xác.';
                }
            } catch (Exception $e) {
                error_log("Login error: " . $e->getMessage());
                $error = 'Có lỗi xảy ra, vui lòng thử lại sau.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Quản Trị - MiTV Pro</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="display:flex; align-items:center; justify-content:center; min-height:100vh; background:#080810;">
    <div style="width:100%; max-width:420px; padding:20px;">
        <div style="background:var(--bg-card); border:1px solid var(--border-primary); border-radius:18px; padding:36px; box-shadow:var(--shadow-card); text-align:center;">
            <div class="brand-icon" style="margin:0 auto 16px; width:52px; height:52px; font-size:1.6rem;">
                <i class="fas fa-lock"></i>
            </div>
            <h2 style="font-size:1.6rem; font-weight:800; margin-bottom:6px;">MiTV Pro <span style="color:var(--primary);">Admin</span></h2>
            <p style="color:var(--text-muted); font-size:0.88rem; margin-bottom:24px;">Hệ thống quản lý dịch vụ & kho ứng dụng</p>

            <?php if (!empty($error)): ?>
                <div style="background:rgba(255,61,61,0.15); border:1px solid #FF3D3D; color:#FF8585; border-radius:8px; padding:10px; font-size:0.85rem; margin-bottom:20px;">
                    <i class="fas fa-circle-exclamation"></i> <?php e($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" style="text-align:left;">
                <input type="hidden" name="csrf_token" value="<?php e($_SESSION['csrf_token']); ?>">

                <div class="form-group">
                    <label class="form-label" style="font-size:0.88rem;">Tài Khoản:</label>
                    <input type="text" name="username" class="form-control" placeholder="admin" required autofocus>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size:0.88rem;">Mật Khẩu:</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-primary" style="width:100%; justify-content:center; padding:12px; margin-top:8px;">
                    <i class="fas fa-right-to-bracket"></i> Đăng Nhập
                </button>
            </form>

            <div style="margin-top:24px; font-size:0.8rem; color:var(--text-muted);">
                <a href="../index.php" style="color:var(--text-sub);"><i class="fas fa-arrow-left"></i> Quay lại website chính</a>
            </div>
        </div>
    </div>
</body>
</html>
