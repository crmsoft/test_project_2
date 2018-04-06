<?php

use App\App;

// composer autoload
require __DIR__.'/../vendor/autoload.php';
// global functions include
require __DIR__.'/../functions/global.php';
// app core
require __DIR__.'/../include/app.php';
// read .env
$dotenv = new Dotenv\Dotenv(__DIR__.'/../config/');
$dotenv->load();

// handle incoming requests
$response = App::handle();
// echo response
echo $response;


/**

 CREATE TABLE `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `parent_id` int(11) DEFAULT NULL,
    `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
 */