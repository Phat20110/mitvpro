@echo off
chcp 65001 >nul
title MiTV Pro - Auto Port Mobile APK to Android TV Leanback
color 0A

echo ====================================================================
echo      MITV PRO: CONVERT ANDROID MOBILE APK TO ANDROID TV (LEANBACK)
echo ====================================================================
echo.

if "%~1"=="" (
    echo [!] Huong dan: Keo tha file APK dien thoai vao file .bat nay!
    echo     Hoac chay lenh: convert_mobile_to_tv.bat app_mobile.apk
    echo.
    pause
    exit /b 1
)

set "INPUT_APK=%~1"
set "APK_DIR=%~dp0"
set "OUTPUT_NAME=%~n1-AndroidTV"

echo [+] File goc: %INPUT_APK%
echo [+] Dang bung file APK bang apktool...
call apktool d -f "%INPUT_APK%" -o "%APK_DIR%%OUTPUT_NAME%"
if errorlevel 1 (
    echo [-] Loi khi bung file APK! Hay chac chan rang da cai dat apktool va java.
    pause
    exit /b 1
)

echo [+] Dang chen Leanback Launcher va tat bat buoc cam ung...
powershell -NoProfile -ExecutionPolicy Bypass -Command ^
    "$manifest = '%APK_DIR%%OUTPUT_NAME%\AndroidManifest.xml';" ^
    "$content = Get-Content -Raw -Path $manifest -Encoding UTF8;" ^
    "if (-not ($content -match 'android.software.leanback')) {" ^
    "    $content = $content -replace '<application', '<uses-feature android:name=\"android.software.leanback\" android:required=\"false\" />`n    <uses-feature android:name=\"android.hardware.touchscreen\" android:required=\"false\" />`n    <application';" ^
    "}" ^
    "if (-not ($content -match 'LEANBACK_LAUNCHER')) {" ^
    "    $content = $content -replace '<category android:name=\"android.intent.category.LAUNCHER\"\s*/>', '<category android:name=\"android.intent.category.LAUNCHER\" />`n                <category android:name=\"android.intent.category.LEANBACK_LAUNCHER\" />';" ^
    "}" ^
    "Set-Content -Path $manifest -Value $content -Encoding UTF8;"

echo [+] Dang tao banner 320x180 mac dinh neu chua co...
if not exist "%APK_DIR%%OUTPUT_NAME%\res\drawable-xhdpi" (
    mkdir "%APK_DIR%%OUTPUT_NAME%\res\drawable-xhdpi" 2>nul
)

echo [+] Dang dong goi lai file APK TV...
call apktool b "%APK_DIR%%OUTPUT_NAME%" -o "%APK_DIR%%OUTPUT_NAME%-unsigned.apk"
if errorlevel 1 (
    echo [-] Loi khi dong goi lai APK!
    pause
    exit /b 1
)

echo [+] Dang can chinh 4-byte (zipalign)...
zipalign -v -p 4 "%APK_DIR%%OUTPUT_NAME%-unsigned.apk" "%APK_DIR%%OUTPUT_NAME%-aligned.apk" 2>nul
if not exist "%APK_DIR%%OUTPUT_NAME%-aligned.apk" (
    copy "%APK_DIR%%OUTPUT_NAME%-unsigned.apk" "%APK_DIR%%OUTPUT_NAME%-aligned.apk" >nul
)

echo.
echo ====================================================================
echo [OK] DA HOAN TAT CHUYEN DOI SANG ANDROID TV THANH CONG!
echo File ket qua: %APK_DIR%%OUTPUT_NAME%-aligned.apk
echo Co the cai dat len Tivi Xiaomi bang Downloader (Ma 6372800) hoac USB.
echo ====================================================================
echo.
pause
