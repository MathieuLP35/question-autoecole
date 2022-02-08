<?php
namespace Controller;

use Core\Template;
use Core\Database;
class QuestionnaireController {
    public static function index () {

        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
        $t = intval(1) ;
        /* $_SESSION['id'] */
        $groupe = Database::find('groupe', $t  );
        var_dump($groupe);
        /* $_SESSION['id_groupe'] */
       $tpl = $twig->load('questionnaire.twig');
        return print $tpl->render([
            'titre' => 'Ton Compte',
            'groupe' => $groupe['name'],
        ]);
    }
}