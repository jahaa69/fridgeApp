<?php

namespace Router;

use Controllers\HomeController;

// Obtenir le chemin de l'URL
$uri = $_SERVER['REQUEST_URI'];

$explodedUri = explode('/', $uri);
$route = '/' . $explodedUri[1];
$id = isset($explodedUri[2]) ? intval($explodedUri[2]) :  null;
$method = $_SERVER['REQUEST_METHOD'];
switch ($route) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/addAlliment':
        if ($method === 'POST') {
            $controller = new HomeController();
            $controller->addAlliment();
        }
        break;
    case '/delete':
            $controller = new HomeController();
            $controller->deleteAllimentC($id);
        break;
    case '/add':
            $controller = new HomeController();
            $controller->addOneAlliment($id);
        break;

        // Ajouter d'autres routes au besoin
    default:
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
        break;
}
