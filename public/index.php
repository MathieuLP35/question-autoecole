<?php

define('APP_DIR', __DIR__);

require('../vendor/autoload.php');

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

require('../App/routes/web.php');

