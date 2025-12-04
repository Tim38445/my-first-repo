set -e

if [-z "$1" ]; then
LARAVEL_DIR="hello"
else
LARAVEL_DIR=$1
fi

composer create-project laravel/laravel "$LARAVEL_DIR"

cp -r "$SCRIPT_DIR/docker" .
cp "$SCRIPT_DIR/docker-compse.yml .

sed -i "s|\./hello:|./${LARAVEL_DIR}:|g" docker-compose.yml

cp "$SCRIPT_DIR/.env.docker" "$LARAVEL_DIR/.env"

docker-compose up -d

sleep 15

docker exec laravel-php php artisan key:generate

docker exec laravel-php php artisan migrate

echo "Your Laravel application is ready"
echo "Visit: http://localhost:8080"