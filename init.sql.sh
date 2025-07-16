#!/bin/sh

echo "🔃 Waiting for MySQL to be ready..."

until mysql -h db -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -e "SELECT 1;" 2>/dev/null; do
  sleep 2
done

echo "✅ MySQL is ready."

echo "🔁 Replacing localhost with env URL..."

sed -E "s|http://localhost:8000|${URL_WORDPRESS}|g; s|\blocalhost:8000\b|${URL_WORDPRESS}|g" /db/wordpress.sql > /tmp/updated.sql

echo "📥 Importing SQL into database..."
mysql -h db -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" < /tmp/updated.sql

echo "✅ Done!"
