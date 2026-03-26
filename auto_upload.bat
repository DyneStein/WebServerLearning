@echo off
setlocal EnableDelayedExpansion

echo ==========================================
echo        Git Auto-Upload Script
echo ==========================================
echo.

echo [1/5] Checking Git Initialization and Remote...
if not exist ".git" (
    git init
    git remote add origin https://github.com/DyneStein/WebServerLearning
    echo Initialized git and added remote origin.
) else (
    git remote get-url origin >nul 2>&1
    if !errorlevel! neq 0 (
        git remote add origin https://github.com/DyneStein/WebServerLearning
        echo Added remote origin.
    ) else (
        echo Git repository already initialized. Current remote:
        git remote get-url origin
    )
)
echo.

echo [2/5] Creating .gitkeep in any empty folders...
:: Loop through all directories recursively
for /d /r %%i in (*) do (
    :: Check if the directory path contains "\.git" to avoid messing with git internals
    echo "%%i" | findstr /i /c:"\.git" >nul
    if errorlevel 1 (
        :: Check if folder is empty by checking if there's any file/folder inside
        dir /b /a "%%~i" 2>nul | findstr "^" >nul
        if errorlevel 1 (
            echo Creating .gitkeep in: %%~i
            type nul > "%%~i\.gitkeep"
        )
    )
)
echo Empty folder scan complete.
echo.

echo [3/5] Tracking all files...
git add .
echo Files staged.
echo.

echo [4/5] Committing changes...
set "COMMIT_MSG="
set /p COMMIT_MSG="Enter commit message (Press Enter for default 'Daily Auto-Upload'): "

if "!COMMIT_MSG!"=="" (
    set "COMMIT_MSG=Daily Auto-Upload"
)

git commit -m "!COMMIT_MSG!"
echo.

echo [5/5] Pushing to remote 'main' branch...
git branch -M main
git push -u origin main
echo.

echo ==========================================
echo             Upload Complete!
echo ==========================================
pause
