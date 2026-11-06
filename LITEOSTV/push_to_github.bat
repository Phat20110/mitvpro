@echo off
echo ========================================================
echo   LITEOSTV - PUSH SANG REPOSITORY GITHUB MOI
echo ========================================================
echo.
set /p REPO_URL="Nhap dia chi GitHub Repository moi (vi du: https://github.com/Phat20110/liteostv.git): "
if "%REPO_URL%"=="" (
    set REPO_URL=https://github.com/Phat20110/liteostv.git
)

echo Dang ket noi toi: %REPO_URL%
git remote remove origin 2>nul
git remote add origin %REPO_URL%
git branch -M main
echo Dang day ma nguon len main...
git push -u origin main --force

echo.
echo Hoan tat dong bo sang repository moi thanh cong!
pause
