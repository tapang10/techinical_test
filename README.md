<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Techinal Test - WHITE TOWER DIGITAL PTY

This project is a user account management system where users can register, log in, and manage characters. It includes email verification, session management, and authentication mechanisms to ensure secure access. 

## FEATURES

- [User Registration and Login]
- [Email Verification with Expiry]
- [Session Management and Logout]
- [Character List Management (Crud Operations)]
- [Bootstrap 5 for Responsive Design]

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## TECHNILOGIES USED

- [Backend: Laravel (PHP Framework)]
- [Frontend: Bootstrap 5, Blade Templates]
- [Database: MySQL]
- [Authentication: Lararvel Auth]
- [Email:Laravel Mail (For Verification)]

## INSTALLATION

1. Clone this repository
- git clone https://github.com/tapang10/techinical_test.git

2. Navigate to the project directory
- cd techinal_test

3. Install dependencies
- composer install
- npm install

4. Copy .env.example to .env and configure database credentials
- cp .env.example .env

5. Generate an application key:
- php artisan key:generate

6. Run migration to set up the database
- php artsan migrate

7. Start the development server
- php artisan serve


## USAGE

1. Access the login page at http://localhost:8000
2. Register a new user account
3. Verify the email address via the link sent to the registered email
4. Log in and manage your characters.

## Routes

Here are some of the key routes in the application:

Route	Method	Description
/login	GET	Show login form
/login	POST	Handle login submission
/sign-up	GET	Show registration form
/sign-up	POST	Handle registration submission
/verify-email	GET	Show email verification notice
/verify-code	POST	Verify the user's email
/characters/{id?}	GET	List or show character details
/characters/save	POST	Save a new character
/characters/delete/{id}	DELETE	Delete a character


Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
