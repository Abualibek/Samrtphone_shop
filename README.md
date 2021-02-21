## About application
<img src="public/images/smartphones.gif" alt="this slowpoke moves"  width=1000/>

It is dynamic eCommerce application for selling mobile and smartphones built with <strong>Laravel 8.0</strong>. <strong>Voyager</strong> admin panerl is integrated to the application where admin of the application can insert, update, delete new products and have access and regulate the users who payed for products. Application have credit/debit card payemt service using <strong>Braintree</strong> payment service.

## Database
Data about all users incuding administration and products details are dynamically stored into Voyager Admin and MySql.

## Instalation
First please eddit the <strong>env.</strong>  file for your setup.
Check migrations file in the application and create tables in mysql or use <strong>php artisan migrate</strong> to create tables
The rest is not difficult to set up if you know the basics of Laravel :)

## To run server run commands:
composer install</br>
composer dump-autoload</br>
php artisan migrate</br>
php artisan serve</br>

