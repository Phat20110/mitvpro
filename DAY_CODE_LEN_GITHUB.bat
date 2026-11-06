@echo off
title DAY CODE MITV PRO LEN GITHUB
color 0a
cls
cd /d "c:\New folder\web"
echo ==============================================================
echo    DANG DAY TOAN BO MA NGUON MITV PRO LEN GITHUB...
echo    Repository: https://github.com/Phat20110/mitvpro
echo ==============================================================
echo.
git push -u origin main
echo.
if %ERRORLEVEL% EQU 0 (
    echo ==============================================================
    echo [THANH CONG] MA NGUON DA DUOC DAY LEN GITHUB 100%!
    echo Kiem tra tai: https://github.com/Phat20110/mitvpro
    echo ==============================================================
) else (
    echo ==============================================================
    echo [THONG BAO] Git can xac thuc tai khoan GitHub cua ban.
    echo Neu trinh duyet vua bat len, hay bam "Authorize" de dong y.
    echo ==============================================================
)
echo.
echo Nhan phim bat ky de tiep tuc...
pause >nul
