## Настройка проекта

- `composer install`
- npm install
- настроить `.env` файл
- `php artisan key:generate`
_____________
###Настройка БД
1) создать БД локально или на сервере и указать ее в .env файле 
2) php artisan migrate
3) php artisan db:seed

_____________

## Запуск приложения

* php artisan serve
______
### При необходимости 
*  npm run watch

### для работы Breadcrumbs

php artisan vendor:publish

composer require davejamesmiller/laravel-breadcrumbs
