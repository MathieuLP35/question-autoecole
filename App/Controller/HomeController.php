<?php
namespace Controller;

use Core\Template;

class HomeController {
    public static function index () {

        return Template::prepare('home')->render();

    }
}