<?php
require_once __DIR__ . '/../config.php';

// Bảo vệ tải file an toàn, chống Path Traversal (LFI)
$allowedFiles = [
    'optimizer' => 'MiTV-Optimizer-v2.5.apk',
    'smarttube' => 'SmartTube-Next-Stable.apk',
    'tvmate'    => 'TiviMate-IPTV-Player.apk'
];

$fileKey = isset($_GET['app']) ? trim($_GET['app']) : 'optimizer';

if (!array_key_exists($fileKey, $allowedFiles)) {
    http_response_code(400);
    die('File yêu cầu không hợp lệ.');
}

$fileName = $allowedFiles[$fileKey];
$filePath = realpath(__DIR__ . '/../downloads/' . $fileName);
$baseDir  = realpath(__DIR__ . '/../downloads');

// Kiểm tra path traversal
if ($filePath === false || strpos($filePath, $baseDir) !== 0 || !file_exists($filePath)) {
    http_response_code(404);
    die('File không tồn tại hoặc đã được chuyển dời.');
}

// Gửi file an toàn
header('Content-Description: File Transfer');
header('Content-Type: application/vnd.android.package-archive');
header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filePath));
flush();
readfile($filePath);
exit;
