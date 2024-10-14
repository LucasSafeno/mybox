<?php

namespace app\controllers;


class Controller
{

    protected $view;

    public function __construct()
    {
        
        $loader = new \Twig\Loader\FilesystemLoader(PATH_VIEW);
        
        $this->view = new \Twig\Environment($loader);
    }

    public  function render($view, $data = [])
    {
   
       echo $this->view->render($view, $data);

    }
}
