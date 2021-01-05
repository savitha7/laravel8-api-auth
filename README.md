# laravel8-api-auth

Laravel 8 REST API with Passport Authentication 
-----------------------------------------------

composer create-project laravel/laravel
composer require laravel/passport
php artisan migrate
 
php artisan passport:install
php artisan passport:keys
php artisan vendor:publish --tag=passport-config
php artisan vendor:publish --tag=passport-migrations

php artisan make:controller API/ApiBaseController --api
php artisan make:controller API/AuthController --api
php artisan make:controller API/Courses/coursesController --api

php artisan make:model Courses/Course -m

php artisan make:resource Courses/Course
