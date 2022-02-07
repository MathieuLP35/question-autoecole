<?php

$r->get('/admin', function () {
    Core\Template::prepare('pages.home')->render();
});

$r->get('/', function () {
    Core\Template::prepare('pages.admin')->render();
});

// $r->get('/clients/{cid}', 'HomeController@totoRoute');