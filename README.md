## Orders API


## Requirements

It is assumed that you have the following tools aready installed on your machine.

•	PHP 8+<br>
•	Laravel 8+<br>
•	Nodejs<br>
•	Git<br>
•	NPM<br>
•	Composer<br>
•	MySQL/MariaDB<br>


## NOTES

•	No API Security like Sanctum token is required<br>


## Setup 

Setting up your development environment on your local machine: 

```
$ git clone git@github.com:mokgosi/orders-eval.git
$ cd orders-eval
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

Browse to http://localhost:8000  to test the app


