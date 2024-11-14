<?php

class DetailsMovieController {
    
    // Méthode pour afficher les détails d'un film
    public function show($id) {
    $model = new MovieModel();
    
    // Récupérer les détails du film
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

}
