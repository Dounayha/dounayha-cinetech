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
                 $movieController->index();
             }
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
 
            

// require_once __DIR__ . '/vendor/autoload.php';
// require_once __DIR__ . '/config/config.php';
// require_once __DIR__ . '/src/router.php';

// use App\Controllers\HomeController;
// use App\Controllers\MovieController;
// use App\Controllers\SeriesController;

// if (isset($_GET['action'])) {
//     $action = $_GET['action'];

//     if ($action === 'movie') {
//         $controller = new MovieController();
//         if (isset($_GET['id'])) {
//             $controller->show($_GET['id']);  // Affiche les détails d'un film spécifique
//         } elseif (isset($_GET['genre'])) {
//             $controller->category($_GET['genre']);  // Affiche les films filtrés par genre
//         } else {
//             $controller->index();  // Affiche tous les films
//         }
//     } elseif ($action === 'series') {
//         $controller = new SeriesController();
//         if (isset($_GET['genre'])) {
//             $controller->filterByGenre($_GET['genre']);  // Affiche les séries filtrées par genre
//         } else {
//             $controller->index();  // Affiche toutes les séries
//         }
//     } else {
//         $controller = new HomeController();
//         $controller->index();  // Page d'accueil par défaut
//     }
// } else {
//     $controller = new HomeController();
//     $controller->index();  // Page d'accueil par défaut
// }
