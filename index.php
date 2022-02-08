<?php

define('APP_DIR', __DIR__);

require('vendor/autoload.php');

// return print (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

require('App/routes/web.php');

