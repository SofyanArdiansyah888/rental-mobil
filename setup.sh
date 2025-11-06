#!/bin/bash

echo "🚀 Simpati Trans Chat - Docker Setup"
echo "===================================="

echo "[INFO] Creating directories..."
mkdir -p docker/mysql-init
mkdir -p public/uploads/ktp

echo "[INFO] Starting Docker containers..."
docker-compose up -d --build

echo ""
echo "[SUCCESS] Setup completed! 🎉"
echo ""
echo "🌐 Application: http://localhost:8080"
echo "💬 Chat: http://localhost:8080/chat"
echo ""
echo "To stop: docker-compose down"
echo "To view logs: docker-compose logs -f"
