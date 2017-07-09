# Information

This repository consist session files of the Laravel Core Concept and Ecosystem, Workshop with Laravel 5 session.

## PDF
Laravel.pdf file is the session slide file. This file origin exists at [Speaker Deck](https://speakerdeck.com/mvatansever/laravel-core-concept-and-ecosystem).


### Requirements
  - PHP
    - PHP >= 5.6.4
    - Curl PHP Extension
    - PDO PHP Extension
    - BCMath PHP Extension
    - Mbstring PHP Extension
    - Mcrypte PHP Extension
    - Tokenizer PHP Extension
    - JSON PHP Extension
  - Database (MySQL)
    - MySQL PHP Native Driver (mysqlnd)
  - RabbitMQ / Redis
  - Composer
    - Laravel


### Installation
You must execute only the following command to install all of dependencies:

```
composer install

php artisan migrate
```
Then you must set the `QUEUE_DRIVER` environment variable which you want to use.

### Description

To get jobs from the `mail` queue with the following command:

```
php artisan queue:work --queue=mail --tries=3
```