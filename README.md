# Business Card

The project aims to provide a RESTful API for managing digital business cards. Users can perform various actions such as logging in, generating business card PDFs, searching for cards, and deleting cards.

## Table of Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Routes](#routes)
- [License](#license)

## Introduction

Provide a brief overview of your project. What problem does it solve? What are its main features?

## Requirements

To run this project, you need to have the following installed:

- PHP >= 8.1
- [laravel/dompdf](https://github.com/barryvdh/laravel-dompdf) (v2.1)
- [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) (v7.2)
- [laravel/sanctum](https://github.com/laravel/sanctum) (latest)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission) (v6.4)
- [milon/barcode](https://github.com/milon/barcode) (v11.0)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/msrnayeem/visiting_card

2. Install PHP dependencies:
    ```bash
   composer install

4. setup environment
    ```bash
    cp .env.example .env
    php artisan key:generate

6. run migration
   ```bash
    php artisan migrate

8. seed default users, role and permissions
   ```bash
    php artisan db:seed



## Routes 

user : email:user@example.com  password: password
admin: email: admin@example.com password: password

GET /login: This endpoint allows users to log in to the system by providing their email and password. Upon successful authentication, it returns a token that can be used for subsequent requests.

POST /logout: Users can use this endpoint to log out of the system. It invalidates the token associated with the user, effectively ending their session.

POST /generate-card: This endpoint generates a business card PDF based on the information provided in the request body, such as name, email, and phone number.

POST /search: Users can search for a specific business card by providing its identifier. The endpoint retrieves the card information associated with the provided identifier.

DELETE /card/{id}: This endpoint allows users to delete a specific business card identified by its unique ID. Once deleted, the card information is permanently removed from the system.

## License
The Laravel framework is open-sourced software licensed under the [MIT License](https://opensource.org/license/MIT)
