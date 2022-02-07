<?php

use Models\Client;

$r->get('/', function () {
    Core\Template::prepare('pages.home')->render();
});

$r->post('/clients', function () {
    $clients = Client::all();
    var_dump($clients);
});

$r->get('/clients/{cid}', 'HomeController@totoRoute');