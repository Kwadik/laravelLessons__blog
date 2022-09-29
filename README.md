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

## Laravel создание Блога 6. Страница создания категории (форма создания)

## Laravel создание Блога 7. Добавление категории. Первая категория

php artisan make:request Admin/Category/StoreRequest

composer require doctrine/dbal (нужно для некоторых операций с бд)

## Laravel создание Блога 8. Получение списка категорий

## Laravel создание Блога 9. Получение одной категории. Страница категории

## Laravel создание Блога 10. Страница для формы редактирования категории


