## Laravel создание Блога 1. Подключаем bootstrap, auth и базу данных
composer require laravel/ui

php artisan ui bootstrap

php artisan ui:auth

npm install && npm run dev (сделал через cmd администратором..)

php artisan migrate

## Laravel создание Блога 2. Первоначальный план и создаем миграции

php artisan make:model Post -m

php artisan make:model Category -m

php artisan make:model Tag -m

php artisan make:model PostTag -m

php artisan migrate

## Laravel создание Блога 3. Подгружаем фронт страницы блога. Список постов

!!! нет свойства namespace в RouteServiceProvider - пропустил пока<br>resolved: 'namespace' => 'App\Http\Controllers\Main'

php artisan make:controller Main/IndexController --invokable

## Laravel создание Блога 4. Ставим фронт админки, установка Admin Lte

## Laravel создание Блога 5. Определяемся со стратегией и создаем задел для CRUD категорий


