<?php
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
        $view->render('MovieDetails', [
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
        $view->render('Movie', [
            'title' => "Films - $category",  // Titre de la page avec la catégorie
            'movies' => $movies,            // Liste des films filtrés
            'category' => $category         // Nom de la catégorie pour affichage
        ]);
    }

      // Méthode pour afficher les films les mieux notés
      public function topRated() {
        $model = new MovieModel();
        $movies = $model->getTopRatedMovies();

        $view = new View();
        $view->render('Movie', [
            'title' => 'Films les mieux notés',
            'movies' => $movies
        ]);
    }

    public function index() {
        $model = new MovieModel();
        $movies = $model->getAllMovies();
    
        $view = new View();
        $view->render('Movie', [
            'title' => 'Tous les films populaires',
            'movies' => $movies
        ]);
    }
}