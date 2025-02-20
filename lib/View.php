<?php

namespace lib;

use lib\Twig\Loader\FilesystemLoader;
use lib\Twig\Environment;



class View
{
    private $twig;
    private $error_tempate = 'service/error.html';
    private $forbidden_tempate = 'service/403.html';
    public  $data = [];

    public function __construct()
    {
        $loader = new FilesystemLoader('../templates');
        // $loader->addPath('../templates', 'lib');
        $this->twig = new Environment($loader, [
            'cache' => '../templates/cache',
            'auto_reload' => true
        ]);
    }

    public function render($template)
    {
        echo $this->twig->render($template, $this->data);
    }

    public function json($value)
    {
        echo json_encode($value);
        exit;
    }

    public function error()
    {
        header('HTTP/1.0 404 Not Found');
        echo $this->twig->render($this->error_tempate);
        exit;
    }

    public function redirect($url) 
    {
        header("Location: $url");
        exit;
    }

    public function forbidden() 
    {
        http_response_code(403);
        echo $this->twig->render($this->forbidden_tempate);
        exit;
    }
}
