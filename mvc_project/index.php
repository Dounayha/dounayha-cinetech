<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';

use App\Controllers\HomeController;
use App\Controllers\MovieController;
use App\Controllers\SeriesController;

// Instancie les contrôleurs
$homeController = new HomeController();
$movieController = new MovieController();
$seriesController = new SeriesController();

// Vérifie les actions et appelle les contrôleurs/méthodes correspondants
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'movie': // Actions liées aux films
            if (isset($_GET['id'])) {
                $movieController->show($_GET['id']); // Affiche les détails d'un film
            } elseif (isset($_GET['genre'])) {
                $movieController->category($_GET['genre']); // Films par genre
            } else {
                $movieController->index(); // Affiche les films populaires
            }
            break;

        case 'all_movies': // Films les mieux notés
            $movieController->topRated();
            break;

        case 'series': // Actions liées aux séries
            if (isset($_GET['id'])) {
                $seriesController->show($_GET['id']); // Affiche les détails d'une série
            } elseif (isset($_GET['genre'])) {
                $seriesController->filterByGenre($_GET['genre']); // Séries par genre
            } else {
                $seriesController->index(); // Affiche toutes les séries
            }
            break;

        default:
            echo "Action non reconnue.";
    }
} else {
    // Par défaut, affiche la page d'accueil
    $homeController->index();
}
