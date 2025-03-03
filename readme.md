# Backend

## PHP 7.4.33

https://windows.php.net/downloads/releases/ > php-7.4.33-Win32-vc15-x64.zip

Unzip to C:\php-7.4.33

Add to environment variables

In Terminal, `php --ini` to find php.ini location  

Uncomment or add `extension_dir = "ext"`   

Uncomment or add `extension=php_fileinfo.dll`   

Uncomment or add `extension=php_openssl.dll`   

Uncomment or add `extension=php_pdo_mysql.dll`

## Database

php artisan make:migration volunteer_add_students

php artisan migrate --force

php artisan migrate:rollback

### Laravel 5.5.50

composer install  

php artisan key:generate  

php artisan migrate

php artisan serve

http://127.0.0.1:8000/

## Laravel Mix

Couldn't `npm i` in local, switch back to normal Javascript instead

Papercut

https://github.com/ChangemakerStudios/Papercut-SMTP

## Admin

Username: admin
Password: 123456

## Node

Install nvm https://github.com/coreybutler/nvm-windows/releases

nvm install 8.17.0

nvm use 8.1.7.0

npm run watch

npm run prod