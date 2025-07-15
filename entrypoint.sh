#!/bin/bash

# Đường dẫn đến functions.php của theme đang xài
THEME_FUNCTIONS="/var/www/html/wp-content/themes/YOUR_THEME/functions.php"

# Đoạn code cần chèn
INJECT_CODE=$(cat <<EOF

// Force HTTPS for enqueued scripts/styles
add_filter('script_loader_src', 'force_https_assets', 10, 2);
add_filter('style_loader_src', 'force_https_assets', 10, 2);
function force_https_assets(\$src) {
    return preg_replace("/^http:/i", "https:", \$src);
}
EOF
)

# Nếu functions.php tồn tại và chưa có code đó thì chèn
if [ -f "$THEME_FUNCTIONS" ]; then
    if ! grep -q "force_https_assets" "$THEME_FUNCTIONS"; then
        echo "$INJECT_CODE" >> "$THEME_FUNCTIONS"
        echo "[INIT] Injected force_https_assets to functions.php"
    fi
fi

# Tiếp tục chạy lệnh mặc định của WordPress
exec docker-entrypoint.sh apache2-foreground
