<?php
namespace Controller;

use Core\Template;
class AdminController {

    public static function index () {
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $tpl = $twig->load('admin.twig');
        return print $tpl->render([
            'titre' => 'Page Admin !',
        ]);
    }

}