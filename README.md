Laravel REST API(Sanctum,Postman) 

![](https://github.com/IgorOlikov/laravel-learn/blob/main/postman.gif)

REST API для интернет магазина.

Коллекция запросов для Postman находится в папке postman_requests_collection

Готовый функционал на данный момент.
1) Окружение Docker с разделением Frontend и Backend части.
2) Регистрация(с подтверждением почты) , логин и выход. Сброс пароля(с подтверждением по почте).
3) Роли и Политики(админ,редактор,пользоватейль).
4) Авторизация доступа к Админ панели путем проверки токена и его прав.
5) Авторизация доступа к редактированию,созданию,удалению отзыва и комментраия.
6) Выдача прав пользователям из админ панели, редактирование и создание контента.
7) Resource API с фильтрацией отдаваемого JSON учитывая уровень доступа пользователя.
8) Возможность загрузки аватара пользователя в профиле.

Функционал который пока не добавлен.
1) Настройка CORS.
2) Фронтенд часть SPA Vue 3 axios запросы, сохранение токена cookie, сохранение сессий.
3) Создание Ордера на оплату со статусами.
4) Корзина Ордера.
5) Сброс почты с е-мейл подтверждением.
6) Отслеживание статуса заказа в профиле.
7) Генерация Swagger документации.

Frontend - http:/localhost:8080

BackendApi - http:/localhost:8081

Руководство по запуску.

Выполнить из корневой папки проекта команды:
1) docker compose build
2) docker compose ud -d
3) docker compose run —rm api-php-cli composer update
4) docker compose run —rm api-php-cli php artisan db:seed

ВАЖНО.

Если сервер будет отвечать с ошибкой 500.
Выдать права на чтение файлов chmod -R 777 chown -R user:user на папку с приложением.
Будет позже исправлено.