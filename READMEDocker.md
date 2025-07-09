# di luar container
docker compose down -v
docker compose up --build -d

# lalu di dalam container
docker exec -it laravel-app bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan migrate --seed
