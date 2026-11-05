<?php
require_once __DIR__ . '/config.php';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php e(isset($pageTitle) ? $pageTitle . ' - ' . APP_NAME : APP_NAME . ' | ' . APP_TAGLINE); ?></title>
    <meta name="description" content="<?php e(isset($pageDesc) ? $pageDesc : 'Dịch vụ cài đặt, hỗ trợ từ xa và tối ưu hoá hệ thống tivi Xiaomi chuyên nghiệp. Tải app không quảng cáo, tối ưu RAM, gỡ bloatware.'); ?>">
    <meta name="keywords" content="tivi xiaomi, cai tivi xiaomi, toi uu xiaomi tv, downloader code, smarttube, viet xiaomi, ho tro tu xa">
    
    <!-- Open Graph SEO -->
    <meta property="og:title" content="<?php e(isset($pageTitle) ? $pageTitle : APP_NAME); ?>">
    <meta property="og:description" content="Trung tâm hỗ trợ và giải pháp tối ưu Tivi Xiaomi hàng đầu Việt Nam.">
    <meta property="og:type" content="website">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Top Security & Announcement Banner -->
    <div class="top-notice">
        <div>
            <i class="fas fa-shield-halved" style="color:#00C853;"></i> 
            Chứng nhận bảo mật kết nối 256-bit &bull; Hỗ trợ trực tuyến <span>24/7</span> &bull; 
            Mã Downloader chính thức: <strong><?php e(APP_DOWNLOADER_CODE); ?></strong> &bull;
            <a href="booking.php" style="color:#00C853; text-decoration:underline; margin-left:6px;"><i class="fas fa-calendar-check"></i> Đặt lịch cài từ xa</a>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo">
                    <div class="brand-icon" style="background:transparent; box-shadow:none; padding:0; width:44px; height:44px;">
                        <img src="assets/img/mitvpro-logo.png" alt="MiTV Pro Logo" style="width:100%; height:100%; object-fit:contain; border-radius:10px; filter:drop-shadow(0 4px 10px rgba(255,103,0,0.4));">
                    </div>
                    <div class="brand-text">
                        MiTV<span>Pro</span>
                        <span class="brand-tag">VN</span>
                    </div>
                </a>

                <ul class="nav-menu" id="navMenu">
                    <li><a href="index.php" class="<?php echo ($currentPage === 'index') ? 'active' : ''; ?>"><i class="fas fa-home"></i> Trang Chủ</a></li>
                    <li><a href="store.php" class="<?php echo ($currentPage === 'store') ? 'active' : ''; ?>" style="color:var(--primary); font-weight:800;"><i class="fas fa-cubes"></i> Kho App Store</a></li>
                    <li><a href="downloader.php" class="<?php echo ($currentPage === 'downloader') ? 'active' : ''; ?>"><i class="fas fa-download"></i> Mã Downloader</a></li>
                    <li><a href="optimizer.php" class="<?php echo ($currentPage === 'optimizer') ? 'active' : ''; ?>"><i class="fas fa-gauge-high"></i> Tối Ưu RAM</a></li>
                    <li><a href="booking.php" class="<?php echo ($currentPage === 'booking') ? 'active' : ''; ?>"><i class="fas fa-calendar-plus"></i> Đặt Lịch Hỗ Trợ</a></li>
                    <li><a href="speedtest.php" class="<?php echo ($currentPage === 'speedtest') ? 'active' : ''; ?>"><i class="fas fa-wifi"></i> Đo Mạng TV</a></li>
                    <li><a href="community.php" class="<?php echo ($currentPage === 'community') ? 'active' : ''; ?>"><i class="fas fa-book"></i> Cẩm Nang Sửa Lỗi</a></li>
                    <li><a href="porting-guide.php" class="<?php echo ($currentPage === 'porting') ? 'active' : ''; ?>"><i class="fas fa-tv"></i> Port App TV</a></li>
                </ul>

                <div class="nav-actions">
                    <button class="btn-code" onclick="copyDownloaderCode('<?php e(APP_DOWNLOADER_CODE); ?>')">
                        <i class="fas fa-bolt"></i> Mã: <?php e(APP_DOWNLOADER_CODE); ?>
                    </button>
                    <a href="track.php" class="btn-outline" style="padding:8px 16px; font-size:0.85rem;" title="Tra cứu phiếu hỗ trợ">
                        <i class="fas fa-magnifying-glass"></i> Tra Cứu Phiếu
                    </a>
                    <a href="<?php e(APP_ZALO); ?>" target="_blank" class="btn-primary">
                        <i class="fas fa-headset"></i> Zalo
                    </a>
                    <button class="menu-toggle" id="menuToggle" aria-label="Menu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
