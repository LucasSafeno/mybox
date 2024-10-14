<?php 

use core\class\Router;

$router = new Router;

$router->get("/", "LoginController", "index");

$router->resolve();



?>