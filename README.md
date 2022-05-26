

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start.


Clone the repository

    git clone https://github.com/syedmahroof/robotapocalypse.git

Switch to the repo folder

    cd robotapocalypse

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve 

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/syedmahroof/robotapocalypse.git
    cd robotapocalypse
    composer install
    cp .env.example .env
    php artisan key:generate
 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder 

    php artisan db:seed

    
## Docker

To install with [Docker](https://www.docker.com), run following commands:

```
git clone https://github.com/syedmahroof/robotapocalypse.git
cd robotapocalypse
cp .env.example .env
composer install
./vendor/bin/sail up -d
 ./vendor/bin/sail artisan key:generate
 ./vendor/bin/sail artisan migrate
 ./vendor/bin/sail artisan db:seed



The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).



## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|



