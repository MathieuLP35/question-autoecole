<?php
namespace Controller;

use Core\Template;
use Core\Database;

class UserController {
    public static function index () {

        try
        {
            $loader = new \Twig\Loader\FilesystemLoader('views');
            $twig = new \Twig\Environment($loader, [
                'cache' => false,
            ]);
            $t = intval(1) ; /* $_SESSION['id'] */
            $client = Database::find('users', $t);
    
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