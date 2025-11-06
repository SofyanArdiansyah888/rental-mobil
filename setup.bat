@echo off
echo 🚀 Simpati Trans Chat - Docker Setup
echo ====================================

echo [INFO] Creating directories...
if not exist "docker\mysql-init" mkdir "docker\mysql-init"
if not exist "public\uploads\ktp" mkdir "public\uploads\ktp"

echo [INFO] Starting Docker containers...
docker-compose up -d --build

echo.
echo [SUCCESS] Setup completed! 🎉
echo.
echo 🌐 Application: http://localhost:8080
echo 💬 Chat: http://localhost:8080/chat
echo.
echo To stop: docker-compose down
echo To view logs: docker-compose logs -f
echo.
pause
