# SaveMyRecipe

A simple Laravel 5 Exercize.

## Installation

Run the following commands in your terminal (from project root):

    composer install
    cp .env.example .env
    php artisan key:generate
    chmod -R 777 storage/*
    touch database/database.sqlite
    php artisan migrate
    php artisan db:seed

**or just lunch the following command:**
    
    composer install && cp .env.example .env && php artisan key:generate && chmod -R 777 storage/* && touch database/database.sqlite && php artisan migrate && php artisan db:seed

_For practicality i used sqlite for develoment. If you want you can 
configure other databases and credentials in the `.env` file._

**Basic users inserted trought seeds:**

    login: user@example.com
    pass:  user

    login: user1@example.com 
    pass:  user1

_You can view other demo users in_ `database/seeds/UsersTableSeeder.php`