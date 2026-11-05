<?php
/**
 * MiTV Pro - Database Connection & Migration Engine (SQLite PDO)
 * Tự động khởi tạo cấu trúc cơ sở dữ liệu khi hệ thống chạy
 */

require_once __DIR__ . '/../config.php';

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $dbPath = __DIR__ . '/../data/mitv_database.sqlite';
        $dataDir = dirname($dbPath);

        if (!is_dir($dataDir)) {
            @mkdir($dataDir, 0750, true);
            @file_put_contents($dataDir . '/.htaccess', "Deny from all\n");
        }

        try {
            $this->pdo = new PDO("sqlite:" . $dbPath);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo->exec("PRAGMA foreign_keys = ON;");
            $this->pdo->exec("PRAGMA journal_mode = WAL;");
            $this->initSchema();
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            die("Lỗi kết nối cơ sở dữ liệu nội bộ. Vui lòng kiểm tra quyền ghi thư mục.");
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }

    private function initSchema() {
        // 1. Bảng quản trị viên (Admin Users)
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS admins (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT UNIQUE NOT NULL,
                password_hash TEXT NOT NULL,
                full_name TEXT NOT NULL,
                role TEXT DEFAULT 'admin',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                last_login DATETIME
            )
        ");

        // Tạo tài khoản admin mặc định nếu chưa có (user: admin / pass: Admin@MiTV2026!)
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as cnt FROM admins");
        $stmt->execute();
        if ($stmt->fetch()['cnt'] == 0) {
            $defaultHash = password_hash('Admin@MiTV2026!', PASSWORD_BCRYPT);
            $initAdmin = $this->pdo->prepare("
                INSERT INTO admins (username, password_hash, full_name, role)
                VALUES (:u, :p, :name, 'superadmin')
            ");
            $initAdmin->execute([
                ':u' => 'admin',
                ':p' => $defaultHash,
                ':name' => 'Kỹ Thuật Viên Trưởng'
            ]);
        }

        // 2. Bảng quản lý kho ứng dụng (Applications & APKs)
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS applications (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                app_name TEXT NOT NULL,
                package_name TEXT,
                version TEXT NOT NULL,
                file_name TEXT NOT NULL,
                file_size_mb REAL DEFAULT 0,
                category TEXT NOT NULL,
                downloader_code TEXT,
                download_count INTEGER DEFAULT 0,
                description TEXT,
                icon_class TEXT DEFAULT 'fa-android',
                status INTEGER DEFAULT 1,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        // 3. Bảng đặt lịch cài đặt tivi từ xa (Booking Service Requests)
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS service_bookings (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                booking_code TEXT UNIQUE NOT NULL,
                customer_name TEXT NOT NULL,
                customer_phone TEXT NOT NULL,
                tv_model TEXT NOT NULL,
                service_package TEXT NOT NULL,
                preferred_time TEXT,
                note TEXT,
                status TEXT DEFAULT 'pending', -- pending, confirmed, processing, completed, cancelled
                technician_note TEXT,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        // 4. Bảng nhật ký tra cứu model tivi (Telemetry Analytics)
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS model_queries (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                model_input TEXT NOT NULL,
                detected_chip TEXT,
                ip_hash TEXT,
                user_agent TEXT,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        // 5. Bảng cẩm nang xử lý lỗi & bài viết cộng đồng (Knowledge Base)
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS knowledge_articles (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                slug TEXT UNIQUE NOT NULL,
                title TEXT NOT NULL,
                category TEXT NOT NULL,
                summary TEXT,
                content TEXT NOT NULL,
                views INTEGER DEFAULT 0,
                helpful_votes INTEGER DEFAULT 0,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        // Seed dữ liệu mẫu kho ứng dụng nếu chưa có
        $stmtApp = $this->pdo->prepare("SELECT COUNT(*) as cnt FROM applications");
        $stmtApp->execute();
        if ($stmtApp->fetch()['cnt'] == 0) {
            $apps = [
                ['MiTV Optimizer Pro', 'com.mitv.optimizer', 'v2.5.0', 'MiTV-Optimizer-v2.5.apk', 4.8, 'Hệ thống', '3041587', 5280, 'Dọn dẹp RAM, gỡ ứng dụng rác, tăng tốc tivi Xiaomi.', 'fa-gauge-high'],
                ['SmartTube Next Stable', 'com.teamsmart.videomanager.tv', 'v21.85', 'SmartTube-Next-Stable.apk', 18.5, 'Giải trí', '28544', 12450, 'Xem YouTube TV 4K không quảng cáo, mở rộng SponsorBlock.', 'fa-youtube'],
                ['TiviMate IPTV Player', 'ar.tvplayer.tv', 'v4.7.0', 'TiviMate-IPTV-Player.apk', 12.2, 'Truyền hình', '11281', 8920, 'Trình phát IPTV chuẩn giao diện Android TV mượt mà nhất.', 'fa-tv'],
                ['Monster TV Cinema', 'com.monstertv.box', 'v3.2.1', 'Monster-TV-HD.apk', 22.4, 'Kho phim', '88412', 7640, 'Kho phim thuyết minh và thể thao bóng đá full HD trực tiếp.', 'fa-film']
            ];

            $insertApp = $this->pdo->prepare("
                INSERT INTO applications (app_name, package_name, version, file_name, file_size_mb, category, downloader_code, download_count, description, icon_class)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            foreach ($apps as $a) {
                $insertApp->execute($a);
            }
        }
    }
}
