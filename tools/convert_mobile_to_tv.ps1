# MiTV Pro - Convert Android Mobile APK to Android TV Leanback
param (
    [Parameter(Mandatory=$false)]
    [string]$ApkPath
)

Write-Host "====================================================================" -ForegroundColor Cyan
Write-Host "     MITV PRO: CONVERT ANDROID MOBILE APK TO ANDROID TV (LEANBACK)  " -ForegroundColor Yellow
Write-Host "====================================================================" -ForegroundColor Cyan

if (-not $ApkPath) {
    $ApkPath = Read-Host "Nhap duong dan file APK can chuyen doi"
}

if (-not (Test-Path $ApkPath)) {
    Write-Host "[-] Khong tim thay file APK: $ApkPath" -ForegroundColor Red
    exit 1
}

$apkName = [System.IO.Path]::GetFileNameWithoutExtension($ApkPath)
$outDir = Join-Path (Split-Path $ApkPath) "$apkName-TV"
$manifestPath = Join-Path $outDir "AndroidManifest.xml"

Write-Host "[+] Dang bung file APK bang apktool..." -ForegroundColor Green
& apktool d -f "$ApkPath" -o "$outDir"

if (-not (Test-Path $manifestPath)) {
    Write-Host "[-] Loi decompile APK hoac khong thay AndroidManifest.xml!" -ForegroundColor Red
    exit 1
}

Write-Host "[+] Dang chen Leanback Launcher & tat yeu cau cam ung..." -ForegroundColor Green
$manifest = Get-Content -Raw -Path $manifestPath -Encoding UTF8

if (-not ($manifest -match 'android.software.leanback')) {
    $leanbackTags = @"
    <uses-feature android:name="android.software.leanback" android:required="false" />
    <uses-feature android:name="android.hardware.touchscreen" android:required="false" />
    <uses-feature android:name="android.hardware.telephony" android:required="false" />
    <uses-feature android:name="android.hardware.camera" android:required="false" />
    <application
"@
    $manifest = $manifest -replace '<application', $leanbackTags
}

if (-not ($manifest -match 'LEANBACK_LAUNCHER')) {
    $manifest = $manifest -replace '<category android:name="android.intent.category.LAUNCHER"\s*/>', '<category android:name="android.intent.category.LAUNCHER" />`n                <category android:name="android.intent.category.LEANBACK_LAUNCHER" />'
}

Set-Content -Path $manifestPath -Value $manifest -Encoding UTF8

Write-Host "[+] Dong goi lai APK TV..." -ForegroundColor Green
$unsignedApk = Join-Path (Split-Path $ApkPath) "$apkName-TV-unsigned.apk"
& apktool b "$outDir" -o "$unsignedApk"

Write-Host "[OK] Chuyen doi xong: $unsignedApk" -ForegroundColor Yellow
