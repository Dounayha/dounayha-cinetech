<?php 

// namespace App;

// use App\Controllers\HomeController;
// use App\Controllers\MovieController;

// class Router {
//     public function __construct() {
//         // Récupère l'URL de la requête et extrait uniquement le chemin sans les paramètres
//         $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        

//         // Retire le sous-dossier "/dounayha-cinetech/mvc_project" de l'URL capturée
//         $url = str_replace('/dounayha-cinetech/mvc_project', '', $url);

//         // Affiche l'URL pour vérifier qu'elle est maintenant correcte
//         echo "URL après ajustement : " . htmlspecialchars($url) . "<br>";

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

//             case (preg_match('/^\/movie\/(\d+)$/', $url, $matches) ? true : false):
//                 // Affiche les détails d'un film spécifique
//                 $controller = new MovieController();
//                 $controller->show($matches[1]);
//                 break;

//             // Autres routes...
//             default:
//                 echo "Page non trouvée";
//                 break;
//         }
//     }
// }
