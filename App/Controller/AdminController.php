<?php
namespace Controller;

use Core\Template;
class AdminController {

    public static function index () {
        return Template::prepare('admin')->render();
    }

}