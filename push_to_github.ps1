param(
    [Parameter(Mandatory=$false)]
    [string]$RepoUrl
)

Write-Host "==========================================" -ForegroundColor Cyan
Write-Host "   MiTV Pro - Đẩy Mã Nguồn Lên GitHub    " -ForegroundColor Cyan
Write-Host "==========================================" -ForegroundColor Cyan

if (-not $RepoUrl) {
    $RepoUrl = Read-Host "Nhập đường dẫn GitHub Repository của bạn (ví dụ: https://github.com/username/mitvpro.git)"
}

if (-not $RepoUrl) {
    Write-Host "Lỗi: Bạn chưa cung cấp đường dẫn GitHub Repository!" -ForegroundColor Red
    exit 1
}

cd "c:\New folder\web"

# Kiểm tra branch hiện tại
git branch -M main

# Kiểm tra remote origin
$existingOrigin = git remote get-url origin 2>$null
if ($existingOrigin) {
    Write-Host "Cập nhật remote origin thành: $RepoUrl" -ForegroundColor Yellow
    git remote set-url origin $RepoUrl
} else {
    Write-Host "Thêm remote origin: $RepoUrl" -ForegroundColor Yellow
    git remote add origin $RepoUrl
}

Write-Host "Đang chuẩn bị đẩy mã nguồn..." -ForegroundColor Green
git add .
git commit -m "feat: complete enterprise-grade system for MiTV Pro" -ErrorAction SilentlyContinue

Write-Host "Đang đẩy lên branch main..." -ForegroundColor Green
git push -u origin main

if ($LASTEXITCODE -eq 0) {
    Write-Host "THÀNH CÔNG: Toàn bộ mã nguồn MiTV Pro đã được đẩy lên GitHub an toàn!" -ForegroundColor Green
} else {
    Write-Host "Nếu GitHub yêu cầu đăng nhập, vui lòng điền Personal Access Token hoặc xác thực qua trình duyệt." -ForegroundColor Yellow
}
