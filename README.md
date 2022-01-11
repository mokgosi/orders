## Orders API


## Tools Used

It is assumed that you have the following tools or reasonable minimum versions already installed on your machine.

•	PHP 8+<br>
•	Laravel 8+<br>
•	Node v14.18.2<br>
•	Git 2.34.1<br>
•	NPM 8.1.0<br>
•	Composer 2.2.4<br>
•	MySQL/MariaDB mysql  Ver 15.1 Distrib 10.3.32-MariaDB<br>


## Setup 

Setting up your development environment on your local machine: 

```
$ git clone git@github.com:mokgosi/orders.git
$ cd orders
$ cp .env.example .env

```

## Install Dependencies

```
$ composer install

```

## Database Configurations

Create a database

```
mysql> create database db_name;

```

Configure app with database credentials - open .env from project root and update as follows

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=username
DB_PASSWORD=password

```

## Run migrations and add some test data

```
$ php artisan migrate
$ php artisan db:seed

```

## Run server

```
$ php artisan serve

```

## Finally

Browse to http://localhost:8000 to test the app  OR  open Postman and test the following endpoints

**Register**

POST http://localhost:8000/api/auth/register

Use returned token to perform CRUD operations.

```
{
    "name": "Super",
    "email": "super@mail.com",
    "password": "TestPassword",
    "password_confirmation": "TestPassword"
}
```

**Login**

Use returned token to perform CRUD operations.

```
{
    "email": "super@mail.com",
    "password": "TestPassword"
}
```

**Get All Orders**

GET http://localhost:8000/api/orders/

**Get One Order**

GET http://localhost:8000/api/orders/1

**Create Order**

POST http://localhost:8000/api/orders/

```
{
    "id": 1,
    "tracking_code": "96504017",
    "quantity": 6,
    "description": "Shoess",
    "contact_number": "+27110112525",
    "address": "123 street suburb 0113"
}

```

**Update Order**

PUT http://localhost:8000/api/orders/1

```
{
    "id": 1,
    "status": "processing",
    "tracking_code": "96504017",
    "quantity": 6,
    "description": "Shoess",
    "contact_number": "+27110112525",
    "address": "123 street suburb 0113"
}

```

**Delete Order**

DELETE http://localhost:8000/api/orders/1


