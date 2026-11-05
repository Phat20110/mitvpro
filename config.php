<?php
/**
 * MiTV Pro - Cấu hình hệ thống & Bảo mật nâng cao
 * Tối ưu & Hỗ trợ chuyên sâu Tivi Xiaomi
 */

// Bật chế độ sản xuất an toàn: TUYỆT ĐỐI không in lỗi ra màn hình
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/logs/security_error.log');

// Tạo thư mục logs nếu chưa tồn tại
if (!is_dir(__DIR__ . '/logs')) {
    @mkdir(__DIR__ . '/logs', 0755, true);
    // Chặn truy cập web vào thư mục logs
    @file_put_contents(__DIR__ . '/logs/.htaccess', "Deny from all\n");
}

// Hàm đọc file .env an toàn không dùng thư viện ngoài
function load_env_file($filePath) {
    if (!file_exists($filePath)) {
        return;
    }
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $key = trim($parts[0]);
            $val = trim($parts[1]);
            // Loại bỏ dấu nháy kép hoặc đơn
            $val = trim($val, "\"'");
            if (!getenv($key)) {
                putenv("{$key}={$val}");
                $_ENV[$key] = $val;
                $_SERVER[$key] = $val;
            }
        }
    }
}

// Nạp biến môi trường nếu có
load_env_file(__DIR__ . '/.env');

function env($key, $default = '') {
    $v = getenv($key);
    return ($v !== false && $v !== '') ? $v : $default;
}

// Thiết lập Security Headers chuẩn OWASP nghiêm ngặt
if (!headers_sent()) {
    header("X-Frame-Options: SAMEORIGIN");
    header("X-Content-Type-Options: nosniff");
    header("X-XSS-Protection: 1; mode=block");
    header("Referrer-Policy: strict-origin-when-cross-origin");
    header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
    header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com https://fonts.googleapis.com https://fonts.gstatic.com data:; img-src 'self' data: https:;");
}

// Cấu hình thông tin hệ thống (ưu tiên lấy từ biến môi trường)
define('APP_NAME', 'MiTV Pro');
define('APP_TAGLINE', 'Trung Tâm Hỗ Trợ & Tối Ưu Tivi Xiaomi Hàng Đầu');
define('APP_HOTLINE', env('APP_HOTLINE', '0988.xxx.xxx'));
define('APP_ZALO', env('APP_ZALO', 'https://zalo.me/'));
define('APP_TELEGRAM', env('APP_TELEGRAM', 'https://t.me/'));
define('APP_TIKTOK', env('APP_TIKTOK', 'https://tiktok.com/@vietxiaomi'));
define('APP_VERSION', '3.0.0');
define('APP_DOWNLOADER_CODE', env('APP_DOWNLOADER_CODE', '363636'));
define('APP_DOWNLOADER_BACKUP_CODE', '898989');

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
