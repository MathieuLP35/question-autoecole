<?php

namespace Core;

use Core\Router;

$r = new Router($_SERVER['REQUEST_URI']);

$r->get('/', 'HomeController@index');
$r->get('/user', 'UserController@index');
$r->get('/questionnaire', 'QuestionnaireController@index');
$r->get('/admin', 'AdminController@index');

$r->run();