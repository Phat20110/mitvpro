@echo off
title Push MiTV Pro to GitHub
chcp 65001 >nul
color 0A
cd /d "c:\New folder\web"
echo ========================================================
echo     ĐANG ĐẨY TOÀN BỘ MÃ NGUỒN MITV PRO LÊN GITHUB...
echo ========================================================
echo.
git push -u origin main
echo.
if %errorlevel% equ 0 (
    echo ========================================================
    echo [THÀNH CÔNG] Đã đẩy toàn bộ mã nguồn lên GitHub thành công!
    echo ========================================================
) else (
    echo.
    echo ========================================================
    echo [LƯU Ý] Nếu xuất hiện cửa sổ đăng nhập GitHub, bạn chỉ cần
    echo nhấn "Sign in with your browser" để hoàn tất xác thực.
    echo ========================================================
)
echo Nhấn phím bất kỳ để đóng cửa sổ này...
pause >nul
