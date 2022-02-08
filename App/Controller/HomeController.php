<?php
namespace Controller;

use Core\Template;

class HomeController {
    public static function index () {

        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $tpl = $twig->load('home.twig');
        return print $tpl->render([
            'titre' => 'Home Page !',
            'name' => 'Name',
            // 'liste' => [
            //     'https://google.com',
            //     'https://google.net',
            //     'https://google.fr',
            // ]
        ]);

    }
}