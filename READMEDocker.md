# Langkah-Langkah Docker
1. Setup .env 

`docker compose down -v` <br>
`docker compose up --build -d`<br>
`docker exec -it laravel-app bash`<br>
`php artisan config:clear`<br>
`php artisan cache:clear`<br>
`php artisan route:clear`<br>
`php artisan view:clear`<br>
`php artisan migrate --seed`<br>
`php artisan storage:link`