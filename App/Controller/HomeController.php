<?php
namespace Controller;

class HomeController {
    public static function index () {

        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $tpl = $twig->load('home.twig');
        return $tpl->render([
            'titre' => 'Hello you !',
            'liste' => [
                'https://google.com',
                'https://google.net',
                'https://google.fr',
            ]
        ]);

    }
}