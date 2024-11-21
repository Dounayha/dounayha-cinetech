<?php
// require_once __DIR__ . '/vendor/autoload.php';
// require_once __DIR__ . '/config/config.php';
// require_once __DIR__ . '/config/database.php';

// use App\Controllers\HomeController;
// use App\Controllers\MovieController;
// use App\Controllers\SeriesController;
// use App\Controllers\UserController;
// use App\config\Database;


// // Instancie les contrôleurs
// $homeController = new HomeController();
// $movieController = new MovieController();
// $seriesController = new SeriesController();

// // Vérifie les actions et appelle les contrôleurs/méthodes correspondants
// if (isset($_GET['action'])) {
//     switch ($_GET['action']) {
//         case 'movie': // Actions liées aux films
//             if (isset($_GET['id'])) {
//                 $movieController->show($_GET['id']); // Affiche les détails d'un film
//             } elseif (isset($_GET['genre'])) {
//                 $movieController->category($_GET['genre']); // Films par genre
//             } else {
//                 $movieController->index(); // Affiche les films populaires
//             }
//             break;

//         case 'all_movies': // Films les mieux notés
//             $movieController->topRated();
//             break;

//         case 'series': // Actions liées aux séries
//             if (isset($_GET['id'])) {
//                 $seriesController->show($_GET['id']); // Affiche les détails d'une série
//             } elseif (isset($_GET['genre'])) {
//                 $seriesController->filterByGenre($_GET['genre']); // Séries par genre
//             } else {
//                 $seriesController->index(); // Affiche toutes les séries
//             }
//             break;

//         default:
//             echo "Action non reconnue.";
//     }
// } else {
//     // Par défaut, affiche la page d'accueil
//     $homeController->index();
// }

// // Connexion à la base de données et création de l'instance du contrôleur
// $pdo = Database::getConnection();
// $userController = new UserController($pdo);

// // Récupérer l'action demandée (par défaut : 'login')
// $action = $_GET['action'] ?? 'login';


//   $pdo = Database::getConnection();
//   $userController = new UserController($pdo);

//  // Vérifie l'action pour l'inscription avant le switch
//  $action = $_GET['action'] ?? 'login';

//   if ($action === 'register') {
//       $userController->register($_POST);
//   } elseif ($action === 'login') {
//       $userController->login($_POST);
//   } elseif ($action === 'update') {
//       $userController->update($_POST);
//   } elseif ($action === 'profile') {
//       $userController->profile();
//   } else {
//       echo "Action non reconnue.";
//  }

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

use App\config\Database;
use App\Controllers\UserController;
use App\Controllers\HomeController;
use App\Controllers\SeriesController;
use App\Controllers\MovieController;


// Connexion à la base de données
$pdo = Database::getConnection();
$userController = new UserController($pdo);

// Récupère l'action à partir de l'URL
$action = $_GET['action'] ?? 'home'; // Par défaut, redirige vers la page d'accueil

switch ($action) {
    case 'home':
        $controller = new HomeController();
        $controller->index(); // Assurez-vous que cette méthode existe
        break;
    case 'register':
        // Affiche le formulaire d'inscription
        $userController->register();
        break;
    case 'handleRegister':
        // Traite les données du formulaire d'inscription
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->handleRegister($_POST);
        } else {
            echo "Méthode non autorisée.";
        }
        break;

    case 'login':
        // Affiche le formulaire de connexion
        $userController->login();
        break;

    case 'handleLogin':
        // Traite les données de connexion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->handleLogin($_POST);
            // Redirection vers la page d'accueil après connexion
            header("Location: index.php?action=home");
            exit();
        } else {
            echo "Méthode non autorisée.";
        }
        break;

    case 'profile':
        // Affiche le profil de l'utilisateur
        $userController->profile();
        break;

    case 'favorites':
        // Affiche les films/séries favoris de l'utilisateur
        $userController->showFavorites();
        break;

    case 'update':
        // Traite la mise à jour des informations de l'utilisateur
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->handleUpdate($_POST);
        } else {
            echo "Méthode non autorisée.";
        }
        break;

    case 'logout':
        // Déconnecte l'utilisateur
        $userController->logout(); 
        break;

    default:
        echo "Action non reconnue.";
        break;
}

// use App\Controllers\HomeController;
//  use App\Controllers\SeriesController;
//  use App\Controllers\UserController;
//  use App\config\Database;


// // Instancie les contrôleurs
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
