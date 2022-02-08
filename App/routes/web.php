<?php

namespace Core;

use Core\Router;

// return print (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$r = new Router((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

$r->get('/', 'HomeController@index');

$r->get('/admin', 'AdminController@index');

$r->get('/users', 'AdminController@index');

$r->run();