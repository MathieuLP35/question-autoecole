<?php

namespace Core;

use Core\Router;
use Core\Template;

$r = new Router($_SERVER['REQUEST_URI']);

$r->get('/', 'HomeController@index');

$r->get('/admin', 'AdminController@index');

$r->run();