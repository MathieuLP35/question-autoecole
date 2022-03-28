<?php
namespace Controller;

use Core\Database;

class UserController {
    public static function index () {

        try
        {
            $loader = new \Twig\Loader\FilesystemLoader('views');
            $twig = new \Twig\Environment($loader, [
                'cache' => false,
            ]);
            $client = Database::find('users', $_SESSION['id']);
    
            $tpl = $twig->load('user.twig');
            return print $tpl->render([
                'titre' => 'Ton Compte',
                'client' => $client
            ]);
        }
        catch (Exception $e)
        {
                die('Erreur :');
        }

    }
}