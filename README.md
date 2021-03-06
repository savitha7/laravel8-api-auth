# laravel8-api-auth

REST API with Laravel 8 Passport Authentication 
-----------------------------------------------

### Install Laravel
```
$ composer create-project laravel/laravel
```
### Install passport
```
$ composer require laravel/passport
```
### Run the Artisan migrate command:
```bash
$ php artisan migrate
```

#### Create "personal access" and "password grant" clients which will be used to generate access tokens:
```bash
$ php artisan passport:install
```
### Install passport config
```
$ php artisan passport:keys
$ php artisan vendor:publish --tag=passport-config
$ php artisan vendor:publish --tag=passport-migrations
```
#### Auth and Course API:
```bash
php artisan make:controller API/ApiBaseController --api

php artisan make:controller API/AuthController --api

php artisan make:controller API/Courses/coursesController --api

php artisan make:model Courses/Course -m

php artisan make:resource Courses/Course
```
Start the local development server

    php artisan serve

You can now access the server at http://127.0.0.1:8000
    
**Make sure you set the correct database connection information before running the migrations**

    php artisan migrate 
    php artisan serve

### API Routes

| HTTP Method	| Path | Action | Scope | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| GET      | /api/courses | index | courses:list | Get all courses
| POST     | /api/courses | store | courses:create | Create a course
| GET      | /api/courses/{course} | show | courses:read |  Fetch the course by id
| PUT      | /api/courses/{course} | update | courses:write | Update the course by id
| DELETE   | /api/courses/{course} | destroy | courses:delete | Delete the course by id

Note: ```/api/register``` ```/api/login``` is a auth routes for getting register & login the user.
And for all Course routes 'course' scope is available if you want to perform all actions.

> **Note:**
- You can now use:

- ```POST /api/register``` –> Create user 

    ```json
    {
    	"name" : "Test User ",
    	"email" : "test@gmail.com",
    	"password" : "secret",
    	"password_confirmation" : "secret"
    
    }

     ```
     
- ```POST /api/login``` –> with email and password, obtain a access token

And remember, Passport requires you to provide the token as a header.

**Run APIs**

Let's run API through postman.

Run authentication API to get passport access token & copy the token and use the same in Header of other CRUD APIs. 

Please check the laravel8-api-auth documentation - The collection published URL. [API Documentation](https://documenter.getpostman.com/view/10171555/Tz5jfLKe)

