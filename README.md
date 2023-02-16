Project name: Packt books

Follow the below steps to get the project up and running

-   run composer install

copy .env.example file and rename it to .env

-   cd into project root directory

-   run php artisan key:generate

-   open .env file and set database connection values
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=packt
    DB_USERNAME=root
    DB_PASSWORD=

-   update the below env configuration

    FILESYSTEM_DISK=public

    SESSION_DRIVER=cookie

-   create database in mysql eg. packt

-   run php artisan migrate

-   run php artisan db:seed

-   run php artisan storage:link

-   run http://localhost/deploy/public/

To access admin

-   http://localhost/deploy/public/login

Username: packt@gmail.com
Password: packt
