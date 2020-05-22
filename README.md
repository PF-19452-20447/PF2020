<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Run it by yourself


 1. Clone this repo.
 2. Run composer update.
 3. Copy .env.example as .env and replace database information + APP_KEY (for encryption).
 4. Run php artisan jwt:secret to generate jwt secret.
 5. Run php artisan migrate.
 6. Run php artisan db:seed to create first user (admin@admin.pt - adminadmin)
 7. Run php artisan serve to locally deploy the application.

## Basic Documentation

Endpoints 
* => required.
  
## User Endpoints


GET /login

Used to login user in the app

Request should contain the following fields on body:

    email (string) *
    password (string) *

Doesnt need auth

Returns: token

```json
    {
        "_token": "HrLB4p3i5TA7lN1LGaC0FriGCW0tBV1pZJxLekUB",
        "_flash": "array:2 [ "old" => [] "new" => [] ]",
        "url": "array:1 [ "intended" => "http://127.0.0.1:8000" ]",
       "_previous": "array:1 [ "url" => "http://127.0.0.1:8000/login" ]"
    }
```

*****************************************************************************************************************************

GET /users

Show list of users.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

POST /register

Create new user on app.

Body request:
- email (string) *
- name (string) *
- password (string) *
- password_confirmation (string) *

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

POST users/create

An authenticated user creates a user in the app.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

GET /users/{user}

Show details of user.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

PUT /users/{user}/update

Update and edit user.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

DELETE /users/delete

Delete user.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

GET /email/verify

Verify user on app.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

## Tenant Endpoints

GET /inquilinos

Show list of tenants.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

GET inquilinos/{inquilino}

Show details of tenant.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

PUT inquilinos/{inquilino}/edit

Update tenant.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

DELETE inqulinos/delete

Delete tenant.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

POST inquilinos/create

Create tenant.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

## Roles Endpoints

GET /roles

Show list of roles.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

GET roles/{role}

Show details of role.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

PUT roles/{role}/edit

Update role.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

DELETE roles/delete

Delete role.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

POST roles/create

Create role.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

## Settings Endpoints

GET /settings

Show list of settings.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

GET /settings/{setting}

Show details of setting.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

PUT /settings/{setting}/edit

Update setting.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

DELETE /settings/delete

Delete setting.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

POST settings/create

Create setting.

Requires auth: Authorization: Bearer *token*

Returns 401 or 404 if auth fails or 200 if ok.

*****************************************************************************************************************************

## Changelog

##### [2020-05-23]
- Installed framework **- Daniela Serra**
- Created base structure for routes file **- Daniela Serra**
- Created route for login with step-by-step comment (for example and understanding of how the framework works) **- Daniela Serra**
- Created simple route that needs auth to retrieve current user information (/users/{user}) **- Daniela Serra**
- Created endpoint to list users **- Daniela Serra**
- Created endpoint to edit user **- Daniela Serra**
- Created endpoint to create new user **- Daniela Serra**
- Created endpointo to create user in the app **- Daniela Serra**
- Created endpoint tp delete user **- Daniela Serra**

##### [2020-05-23]
- Created endpoint to retrieve tenants  **- Daniela Serra**
- Created endpoint to edit tenant  **- Daniela Serra**
- Created endpoint to create new tenant  **- Daniela Serra**
- Created endpoint to delete tenant  **- Daniela Serra**
- Created endpoint to list tenant **- Daniela Serra**

##### [2020-05-23]

- Created endpoint to retrieve roles  **- Daniela Serra**
- Created endpoint to edit role  **- Daniela Serra**
- Created endpoint to create new role  **- Daniela Serra**
- Created endpoint to delete role  **- Daniela Serra**
- Created endpoint to list role **- Daniela Serra**

##### [2020-05-23]

- Created endpoint to retrieve settings  **- Tomás Colaço**
- Created endpoint to edit setting  **- Tomás Colaço**
- Created endpoint to create new setting  **- Tomás Colaço**
- Created endpoint to delete setting  **- Tomás Colaço**
- Created endpoint to list setting **- Tomás Colaço**
