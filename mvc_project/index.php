<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';

use App\Controllers\HomeController;
use App\Controllers\MovieController;
use App\Controllers\SeriesController;

// Instancie les contrôleurs
$movieController = new MovieController();
$seriesController = new SeriesController();

// Vérifie les actions et appelle les contrôleurs/méthodes correspondants
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'movie':
            if (isset($_GET['id'])) {
                $movieController->show($_GET['id']);
            } elseif (isset($_GET['genre'])) {
                $movieController->category($_GET['genre']);
            } else {
                $movieController->index(); // Affiche les films populaires pour l'accueil
            }
            break;

        case 'all_movies': // Nouvelle action pour afficher les films les mieux notés
            $movieController->topRated();
            break;

        case 'series':
            if (isset($_GET['genre'])) {
                $seriesController->filterByGenre($_GET['genre']);
            } else {
                $seriesController->index();
            }
            break;

        default:
            echo "Action non reconnue.";
    }
} else {
    // Par défaut, affiche la page d'accueil
    $homeController = new HomeController();
    $homeController->index();
}
