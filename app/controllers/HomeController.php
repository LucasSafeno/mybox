<?php

namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->view->render('home.html.twig', [
            'titulo' => 'Login MyBox - AtualTech Soluções Tecnológicas'
        ]);
        $this->view->display('home.html.twig');
        
    }
}
