<?php

namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Template {
    private string $tpl = '';
    private array $vars = [];

    private function __construct (string $tpl_name) {
        $tpl_parts = explode('.', $tpl_name);
        $tpl_name = implode('/', $tpl_parts).'.twig';
        $tpl_path = APP_DIR.'/views/'.$tpl_name;
        if (file_exists($tpl_path)) {
            $this->tpl = $tpl_name;
            return $this;
        } else {
            throw new \Exception("Le template $tpl_path n'existe pas dans ce projet !");
        }
    }

    static function prepare (string $tpl) {
        return new self($tpl);
    }

    public function with (array $var) {
        $this->vars = $var;
        return $this;
    }

    public function render () {
        $tpl_conf = Config::get('tpl');
        $cache = false;
        if ($tpl_conf['cache']['enabled']) {
            $cache = APP_DIR.'/'.$tpl_conf['cache']['path'];
        }
        $twig_loader = new FilesystemLoader(APP_DIR.'/views/');
        $twig = new Environment($twig_loader, [
            'debug' => $tpl_conf['debug'],
            'cache' => $cache,
        ]);
        $template = $twig->load($this->tpl);
        print $template->render($this->vars);
    }

}