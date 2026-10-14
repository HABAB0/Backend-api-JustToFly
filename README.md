Быстрый старт
```
git clone https://github.com/HABAB0/Backend-api-JustToFly.git
cd cafedra/deploy
docker compose up -d --build
docker exec -it app php artisan migrate:fresh --seed