#!/bin/bash

# Tên file env
ENV_FILE=".env"

# Kiểm tra nếu .env chưa tồn tại, thì tạo mới với nội dung mặc định
if [ ! -f "$ENV_FILE" ]; then
  echo "Tạo file .env mặc định..."
  cat <<EOL > $ENV_FILE
MYSQL_ROOT_PASSWORD=password
MYSQL_DATABASE=wordpress
MYSQL_USER=wordpress
MYSQL_PASSWORD=wordpress

PMA_PORT=8080
WP_PORT=8000
WORDPRESS_DB_HOST=db:3306
WORDPRESS_DB_USER=wordpress
WORDPRESS_DB_PASSWORD=wordpress
URL_WORDPRESS=http://localhost
USERNAME=thongwe
EOL
else
  echo "Đã có file .env, bỏ qua bước tạo..."
fi

# Load biến để dùng trong echo bên dưới
export $(grep -v '^#' .env | xargs)

# Lấy IP máy (tuỳ chọn)
IP=$(hostname -I | awk '{print $1}')

echo "✅ Pull image mới nhất (nếu có)..."
docker compose pull

echo "🚀 Khởi động project với docker-compose..."
docker compose up -d

echo ""
echo "📦 Các container đang chạy:"
docker ps

echo ""
echo "🌐 Truy cập WordPress: http://$IP:${WP_PORT:-8000}"
echo "🌐 Truy cập phpMyAdmin: http://$IP:${PMA_PORT:-8080}"
