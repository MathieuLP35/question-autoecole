<?php
namespace Controller;

use Core\Database;
use Twig\TwigFilter;

class LoginController {
    public static function index() {
        try
        {
            $loader = new \Twig\Loader\FilesystemLoader('views');
            $twig = new \Twig\Environment($loader, [
                'cache' => false,
                'debug' => true,
            ]);    
            $twig->addExtension(new \Twig\Extension\DebugExtension());
            $tpl = $twig->load('login.twig');
            return print $tpl->render([
                new TwigFilter('connectUsers', [LoginController::class, 'connectUsers']),
                'titre' => 'Connexion',
            ]);
        }
        catch (Exception $e)
        {
                die('Erreur :');
        }
    }

    public static function connectUsers(string $user, string $pass){
        
        $bdd = new Database;

        $request = $bdd->query('SELECT * FROM users WHERE name = :name', ([
            ':name' => $user,
        ]));

        $user = $request->fetch();

        var_dump($user);

    }
}