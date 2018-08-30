Инструкция
**********

Дефолтный пользователь(модератор): admin@example.com/admin

Процесс разворачивания:

**Шаг первый**

``git clone current_repo`` - Склонируйте репозиторий

``cd cloned_repo``

``curl -sS https://getcomposer.org/installer | php``

``php composer.phar install``

``cp .env.example .env``

**Шаг второй**

Создайте новую бд.

Произвести замену значений основных констант в .env и там же настроить почту:

    APP_ENV=
    APP_DEBUG=false
    APP_URL=
    DB_HOST=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    MAIL_DRIVER=
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=

**Шаг третий**

``chmod -R 777 storage app``

``php artisan key:generate``

``php artisan migrate``
 
``php artisan db:seed --class=UserDefaultSeeds``

``php artisan config:clear``

``php artisan cache:clear``
