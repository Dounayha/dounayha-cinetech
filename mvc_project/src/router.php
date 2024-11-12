<?php 
// src/Router.php
// namespace App;

// use App\Controllers\HomeController;

// class Router {
//     public function __construct() {
//         // Récupère l'URL de la requête
//         $url = $_SERVER['REQUEST_URI'];

//         // Routes possibles de l'application
//         switch ($url) {
//             case '/':
//                 // Si l'URL est la racine, on charge la page d'accueil
//                 $controller = new HomeController();
//                 $controller->index();  // Appelle la méthode index du HomeController
//                 break;
            
//             case '/accueil':
//                 // Une autre route pour l'accueil, si tu veux personnaliser l'URL
//                 $controller = new HomeController();
//                 $controller->index();
//                 break;

//             // Ajoute d'autres routes si nécessaire
//             default:
//                 echo "Page non trouvée";  // Si aucune route ne correspond
//                 break;
//         }
//     }
// }
// namespace App;

// use App\Controllers\MovieController;
// use App\Controllers\SeriesController;

// class Router {
//     public function __construct() {
//         // Récupère l'URL de la requête
//         $url = $_SERVER['REQUEST_URI'];

//         // Routes possibles de l'application
//         switch ($url) {
//             case '/':
//                 // Accueil
//                 $controller = new HomeController();
//                 $controller->index();
//                 break;
                
//             case '/movies':
//                 // Affiche tous les films
//                 $controller = new MovieController();
//                 $controller->index();
//                 break;

//             case (preg_match('/^\/movies\/category\/(.+)$/', $url, $matches) ? true : false):
//                 // Affiche les films filtrés par catégorie
//                 $controller = new MovieController();
//                 $controller->category($matches[1]);
//                 break;

//             case '/series':
//                 // Affiche toutes les séries
//                 $controller = new SeriesController();
//                 $controller->index();
//                 break;

//             case (preg_match('/^\/series\/category\/(.+)$/', $url, $matches) ? true : false):
//                 // Affiche les séries filtrées par catégorie
//                 $controller = new SeriesController();
//                 $controller->category($matches[1]);
//                 break;

//             // Autres routes...
//             default:
//                 echo "Page non trouvée";
//                 break;
//         }
//     }
// }
namespace App;

use App\Controllers\MovieController;

class Router {
    public function __construct() {
        // Récupère l'URL de la requête
        $url = $_SERVER['REQUEST_URI'];

        // Routes possibles de l'application
        switch ($url) {
            case '/':
                // Accueil
                $controller = new HomeController();
                $controller->index();
                break;

            case '/movies':
                // Affiche tous les films
                $controller = new MovieController();
                $controller->index();
                break;

            case (preg_match('/^\/movies\/category\/(.+)$/', $url, $matches) ? true : false):
                // Affiche les films filtrés par catégorie
                $controller = new MovieController();
                $controller->category($matches[1]);
                break;

            case (preg_match('/^\/movie\/(\d+)$/', $url, $matches) ? true : false):
                // Affiche les détails d'un film spécifique
                $controller = new MovieController();
                $controller->show($matches[1]);
                break;

            // Autres routes...
            default:
                echo "Page non trouvée";
                break;
        }
    }
}
