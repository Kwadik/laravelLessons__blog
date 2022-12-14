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

## Laravel создание Блога 12. Удаление категории

php artisan make:migration add_column_soft_deletes_to_categories_table

## Laravel создание Блога 13. Полностью добавляем CRUD для тегов

php artisan make:migration add_column_soft_deletes_to_tags_table

## Laravel создание Блога 15. Добавляем атрибут content для поста, визуальный редактор Summernote

## Laravel создание Блога 16. Добавляем атрибуты для загрузки изображений

artisan make:migration add_columns_for_images_to_posts_table

## Laravel создание Блога 17. Добавляем возможность привязывать пост к категории

## Laravel создание Блога 18. Добавляем возможность привязывать тэги.

## Laravel создание Блога 19. Реализуем апдейт у постов, форма редактирования, отображение изображений

php artisan storage:link<br>
перелинковка папок с картинками storage в public

## Laravel создание Блога 20. Удаление постов, используем soft delete, казус удаления колонки sqlite

## Laravel создание Блога 21. Создаем класс Service для рефакторинга создания и обновления постов

## Laravel создание Блога 22. Изменяем сообщения об ошибке в классе Request

## Laravel создание Блога 23. Полностью добавляем основу CRUDа для пользователей (неполная реализация)

## Laravel создание Блога 24. Полностью дорабатываем CRUD для пользователей

php artisan make:migration add_soft_deletes_for_users_table

## Laravel создание Блога 25. Внедряем роли для пользователей и улучшаем валидацию для апдейта

php artisan make:migration add_column_role_to_users_table

## Laravel создание Блога 26. Создаем Middleware для админки и auth middleware, делаем кнопку выхода

php artisan make:middleware AdminMiddleware

## Laravel создание Блога 27. Автогенерация пароля, отправка почты. Mailtrap и класс Mailable в Laravel

php artisan make:mail User/PasswordMail -m mail.user.password

Отправку письма протестировал на своем ящике, в .env задал настройки smtp

## Laravel создание Блога 28. Отправление письма с подтверждением учетной записи Email verification

## Laravel создание Блога 29. Отправка писем с использованием очередей. Создаем свой Notification класс

php artisan queue:table

php artisan migrate

php artisan make:notification SendVerifyWithQueueNotification

.env QUEUE_CONNECTION=database

.env APP_URL=http://127.0.0.1:8000/ (уточнение урла для корректных ссылок в письме)

php artisan queue:work (команда запуска готовой очереди)

## Laravel создание Блога 30. Создаем класс Job. Пример работы с очередями любого алгоритма/действия

php artisan make:job StoreUserJob

## Laravel создание Блога 31. Делаем общие косметические изменения по дизайну и редиректам

## Laravel создание Блога 32. Создаем личный кабинет пользователя

## Laravel создание Блога 33. Структура в бд для лайков и их отображение в личном кабинете

php artisan make:model PostUserLike -m

## Laravel создание Блога 34. Структура в бд для комментариев и их отображение в личном кабинете

php artisan make:model Comment -m

## Laravel создание Блога 35. Вывод ленты постов. Случайные посты. Популярные посты. Пагинация

php artisan make:migration add_column_is_featured_to_posts_table

php artisan vendor:publish --tag=laravel-pagination


