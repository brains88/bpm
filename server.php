<?php

/**
National ID
International Passport
NIN
vOTERS CARD 
DRIVER lISCENCE
gOVERNMENT api For ID NUmber Verification.
Slider on login explaining what the comapny does.
Delete Third party sold property after one month
Delete Posted property after 6months of dormancy
Username: administrator
Pass: email@admin
*/

/**
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan cache:clear
composer dumpautoload
*/

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
