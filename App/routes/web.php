<?php

namespace Core;

use Core\Router;

$r = new Router($_SERVER['REQUEST_URI']);

// $r->get('/', function () {
//     Core\Template::prepare('pages.home')->render();
// });

// $r->get('/clients', function () {
//     $clients = Client::all();
//     var_dump($clients);
// });


$r->get('/', 'HomeController@index');

$r->get('/login', 'LoginController@index');

$r->get('/user', 'UserController@index');
$r->get('/questionnaire', 'QuestionnaireController@index');
$r->get('/admin', 'AdminController@index');

$r->run();