Project name: Packt books

Follow the below steps to get the project up and running

-   cd into project root directory

-   run composer install

copy .env.example file and rename it to .env

-   run php artisan key:generate

-   create database in mysql eg. packt

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

-   run php artisan migrate

-   run php artisan db:seed

-   run php artisan storage:link

-   run http://localhost/deploy/public/

To access admin

-   http://localhost/deploy/public/login

Username: packt@gmail.com
Password: packt

## APIs

Url: http://localhost/packt/public/api/login

Admin area only

## Login

Method - POST
Endpoint - /login
Body - Form-data

Params

-   email (text)
-   password (text)

## Genre list

Method - GET
Endpoint - /genre/all

## Publisher list

Method - GET
Endpoint - /publisher/all

## Save book

Method - POST
Endpoint - /book/save
Body - Form-data

Params

-   title (text)
-   author (text)
-   genre_id (text)
-   isbn (text)
-   description (text)
-   published (text)
-   publisher_id (text)
-   image (file)

If updating, pass id

-   id (text)

## All books list

Method - GET
Endpoint - /book/all

Usage for data table

Params

-   order[0][column] - default(4)
-   order[0][dir] - default(desc)
-   start - default(0)
-   length - default(10)
-   search[value] - default('')

## Single book

Method - GET
Endpoint - /book/single

Params

-   book_id (id of book)

## Delete book

Method - DELETE
Endpoint - /book/delete

Params

-   id (id of book)

## Delete books

Method - DELETE
Endpoint - /book/delete

Params

-   ids (comma separated values eg. 34,45,67)

Front area only

## All books list

Method - GET
Endpoint - /books

Params

-   page (page number eg. 1)

## Single book

Method - GET
Endpoint - /book

Params

-   book_id (id of book)
