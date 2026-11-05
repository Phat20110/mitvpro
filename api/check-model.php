<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Chỉ chấp nhận phương thức POST']);
    exit;
}

$model = isset($_POST['model']) ? trim(strip_tags($_POST['model'])) : '';

if (empty($model)) {
    echo json_encode(['error' => 'Thiếu thông tin model tivi']);
    exit;
}

$modelUpper = strtoupper($model);
$response = [
    'model' => clean_output($model),
    'system_type' => 'Android TV / MIUI TV Quốc tế & Nội Địa',
    'memory_status' => 'RAM 1.5GB - 2GB / ROM 8GB - 32GB',
    'recommendation' => 'Cần dọn sạch các tiến trình rác chạy ngầm của Xiaomi (MiuiDaemon, MSA), cài SmartTube nhẹ thay thế YouTube mặc định.',
    'package_advice' => 'Gói Trọn Gói (Gỡ quảng cáo + Tối ưu RAM + Cài YouTube không quảng cáo)',
    'downloader_code' => APP_DOWNLOADER_CODE
];

// Phân tích nâng cao theo dòng máy
if (strpos($modelUpper, 'EA') !== false) {
    $response['system_type'] = 'Dòng Xiaomi EA Series (MIUI TV nội địa/quốc tế)';
    $response['memory_status'] = 'Cấu hình tiêu chuẩn (1.5GB/2GB RAM) - Thường bị giật lag sau 6 tháng sử dụng';
    $response['recommendation'] = 'Khuyến nghị: Chuyển giao diện sang Tiếng Việt chuẩn, tắt launcher mặc định ngốn RAM, cài MiTV Optimizer để giải phóng 45% RAM trống.';
} elseif (strpos($modelUpper, 'PRO') !== false || strpos($modelUpper, 'MAX') !== false) {
    $response['system_type'] = 'Dòng Cao Cấp (A Pro / Redmi MAX / TV S Pro - Tần số quét cao 120Hz/144Hz)';
    $response['memory_status'] = 'Cấu hình mạnh (2GB - 4GB RAM) - Tối ưu cho phim 4K HDR & Gaming';
    $response['recommendation'] = 'Khuyến nghị: Tối ưu bộ giải mã âm thanh Dolby Audio, mở khoá YouTube 4K 60fps AV1, cài app xem bóng đá trực tiếp độ trễ thấp.';
} elseif (strpos($modelUpper, '4A') !== false || strpos($modelUpper, '4S') !== false || strpos($modelUpper, '4C') !== false) {
    $response['system_type'] = 'Dòng Xiaomi Thế Hệ Cũ (Mi TV 4 Series)';
    $response['memory_status'] = 'Cấu hình thấp (1GB - 2GB RAM / Bộ nhớ 8GB hạn chế)';
    $response['recommendation'] = 'Cảnh báo: Bộ nhớ thường xuyên báo đầy! Cần gỡ sạch bloatware gốc, di chuyển dữ liệu cache ra USB và cài bản YouTube Lite siêu nhẹ.';
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit;
