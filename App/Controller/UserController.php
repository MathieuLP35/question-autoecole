<?php
namespace Controller;

use Core\Template;
use Core\Database;

class UserController {
    public static function index () {

        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
        $t = intval(1) ; /* $_SESSION['id'] */
        $client = Database::find('users', $t  );
        var_dump($client); 

        $tpl = $twig->load('user.twig');
        return print $tpl->render([
            'titre' => 'Ton Compte',
            'name' => $client['name'] .' '. $client['firstname'],
            'taux' => $client['taux'], 
            'nb_questionnaire' => $client['nb_questionnaire'], 
            'client_groupe' => $client['id_groupe'], 

        ]);

    }
}