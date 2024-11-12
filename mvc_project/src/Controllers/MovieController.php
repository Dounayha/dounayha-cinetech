<?php
// namespace App\Controllers;

// use App\Views\View;
// use App\Models\MovieModel;

// class MovieController {
//     public function show($id) {
//         // Créer une instance du modèle MovieModel
//         $model = new MovieModel();
        
//         // Récupérer les détails du film, y compris les crédits (réalisateurs et acteurs)
//         $movie = $model->getMovieDetails($id);

//         // Créer une instance de la vue
//         $view = new View();
        
//         // Passer les données à la vue pour affichage
//         $view->render('movieDetails', [
//             'title' => $movie['title'],  // Titre du film
//             'movie' => $movie,           // Détails du film, y compris les crédits
//         ]);
//     }
// }
namespace App\Controllers;

use App\Views\View;
use App\Models\MovieModel;

class MovieController {
    public function show($id) {
        $model = new MovieModel();
        
        // Récupère les détails du film
        $movie = $model->getMovieDetails($id);
        
        if ($movie === null) {
            // Si le film n'a pas été trouvé, afficher un message d'erreur
            echo "Film non trouvé.";
            return;
        }

        // Crée une instance de la vue
        $view = new View();
        
        // Passe les données à la vue pour affichage
        $view->render('movieDetails', [
            'title' => $movie['title'],  // Titre du film
            'movie' => $movie,           // Détails du film
        ]);
    }

    // Afficher les films filtrés par catégorie
    public function category($category) {
        // Créer une instance du modèle
        $model = new MovieModel();
        
        // Récupérer les films filtrés par catégorie
        $movies = $model->getMoviesByCategory($category);

        // Créer une instance de la vue
        $view = new View();
        
        // Passer les films filtrés par catégorie à la vue pour affichage
        $view->render('movies', [
            'title' => "Films - $category",  // Titre de la page avec la catégorie
            'movies' => $movies,            // Liste des films filtrés
            'category' => $category         // Nom de la catégorie pour affichage
        ]);
    }
}
