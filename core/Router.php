<?php

namespace core;

use app\controllers\error\NotFoundController;

class Router
{
    public array $routes = [];


    public function get($uri, $controller):void
    {
        $this->routes['GET'][$uri] = $controller;

    } // get

    public function post($uri, $controller):void 
    {
        $this->routes['POST'][$uri] = $controller;
    } // post

    public function put($uri, $controller):void
    {
        $this->routes['PUT'][$uri] = $controller;
    }// put
    public function delete($uri, $controller):void
    {
        $this->routes['DELETE'][$uri] = $controller;
    }// delete

    public function option($uri, $controller):void
    {
        $this->routes['OPTION'][$uri] = $controller;
    } // option

    public function head($uri, $controller):void  
    {
        $this->routes['HEAD'][$uri] = $controller;
    }// HEAD

    public function run(){
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if(isset($this->routes[$method][$uri])){
            $parts = explode('@', $this->routes[$method][$uri]);
            $controllerInstance = "app\\controllers\\".$parts[0];
            $controller = new $controllerInstance;
            $method = $parts[1];
            $controller->$method();
        }else{
            $controllerInstance = "app\\controllers\\error\\NotFoundController";
            $controller = new $controllerInstance;
            $method = "index";
            $controller->$method();
        }
    }//run

}
