<?php

//Wird nur einmal geladen mit require
require __DIR__ . "/../init.php";

//Session wird gleich am anfang gestartet
session_start();

//var_dump($_SERVER);
/*Route wird über PATH_INFO geladen
Jeder Seite/Route wird der dazugehörige Controller und Funktion zugeordnet*/
$pathInfo = $_SERVER['PATH_INFO'];

$routes = [
  '/index' => [
    'controller' => 'postsController',
    'method' => 'index',
  ],
  '/post' => [
    'controller' => 'postsController',
    'method' => 'show'
  ],
  '/login' => [
    'controller' => 'loginController',
    'method' => 'login'
  ],
  '/logout' => [
    'controller' => 'loginController',
    'method' => 'logout'
  ],
  '/dashboard' => [
    'controller' => 'loginController',
    'method' => 'dashboard'
  ],
  '/register' => [
    'controller' => 'registerController',
    'method' => 'show'
  ],
  '/insertRegister' => [
    'controller' => 'registerController',
    'method' => 'register'
  ],
  '/passwordReset' => [
    'controller' => 'resetController',
    'method' => 'showReset'
  ],
  '/passwordChange' => [
    'controller' => 'resetController',
    'method' => 'showChange'
  ]
];

/*Abfrage des Arrays $routes und Auswahl der richtigen Route und des dementsprechenden Controllers*/
if (isset($routes[$pathInfo])){
  $route = $routes[$pathInfo];
  $controller = $container->make($route['controller']);
  $method = $route['method'];
  ($controller->$method($id));
}

/*
if ($pathInfo == "/index"){
$postsController = $container->make("postsController");
$postsController->index();
}
elseif ($pathInfo == "/post"){
$postsController = $container->make("postsController");
$postsController->show($id);
}
*/


?>
