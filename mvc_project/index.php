<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';  // Inclure la configuration
require_once __DIR__ . '/src/router.php';


use App\Controllers\HomeController;
use App\Controllers\MovieController;
use App\Router;

// Crée une instance du routeur et démarre le routage
$router = new Router();

if (isset($_GET['action']) && $_GET['action'] === 'movie' && isset($_GET['id'])) {
    $controller = new MovieController();
    $controller->show($_GET['id']);
} else {
    $controller = new HomeController();
    $controller->index();
}

