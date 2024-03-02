# Backend

### PHP 7.4.33

https://windows.php.net/downloads/releases/ > php-7.4.33-Win32-vc15-x64.zip

Unzip to C:\php-7.4.33

Add to environment variables

In Terminal, `php --ini` to find php.ini location  

Uncomment or add `extension_dir = "ext"`   

Uncomment or add `extension=php_fileinfo.dll`   

Uncomment or add `extension=php_openssl.dll`   

Uncomment or add `extension=php_pdo_mysql.dll`  

### Laravel

composer install  

php artisan key:generate  

php artisan migrate

php artisan serve

http://127.0.0.1:8000/

# Frontend

npm i  
npm run watch

http://localhost/action-for-singapore-dogs/public/