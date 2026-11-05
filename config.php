<?php
/**
 * MiTV Pro - Cấu hình hệ thống & Bảo mật
 * Tối ưu & Hỗ trợ chuyên sâu Tivi Xiaomi
 */

// Bật strict type và tắt hiển thị lỗi nhạy cảm ra ngoài frontend
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

// Thiết lập Security Headers chuẩn OWASP
if (!headers_sent()) {
    header("X-Frame-Options: SAMEORIGIN");
    header("X-Content-Type-Options: nosniff");
    header("X-XSS-Protection: 1; mode=block");
    header("Referrer-Policy: strict-origin-when-cross-origin");
    header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com https://fonts.googleapis.com https://fonts.gstatic.com data:; img-src 'self' data: https:;");
}

// Cấu hình thông tin hệ thống
define('APP_NAME', 'MiTV Pro');
define('APP_TAGLINE', 'Trung Tâm Hỗ Trợ & Tối Ưu Tivi Xiaomi Hàng Đầu');
define('APP_HOTLINE', '0988.xxx.xxx');
define('APP_ZALO', 'https://zalo.me/');
define('APP_TELEGRAM', 'https://t.me/');
define('APP_TIKTOK', 'https://tiktok.com/@vietxiaomi');
define('APP_VERSION', '2.5.0');
define('APP_DOWNLOADER_CODE', '3041587'); // Mã Downloader chính thức

// Hàm lọc chống XSS an toàn
function clean_output($data) {
    if (is_array($data)) {
        return array_map('clean_output', $data);
    }
    return htmlspecialchars(trim((string)$data), ENT_QUOTES, 'UTF-8');
}

// Shortcut xss
function e($str) {
    echo clean_output($str);
}

// Khởi tạo session an toàn với cookie bảo mật
if (session_status() === PHP_SESSION_NONE) {
    $cookieParams = [
        'lifetime' => 86400,
        'path' => '/',
        'domain' => '',
        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
        'httponly' => true,
        'samesite' => 'Lax'
    ];
    session_set_cookie_params($cookieParams);
    session_start();
}

// Tạo CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function verify_csrf($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
