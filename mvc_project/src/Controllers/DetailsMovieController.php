<?php

// Inclure le fichier de l'API
//  include 'tmdb-api.php';

class DetailsMovieController {
    
    // Méthode pour afficher les détails d'un film
    public function show($movieId) {
        // Vérifie si l'ID du film est valide
        if (!$movieId) {
            echo "ID de film invalide.";
            return;
        }
        
        // Obtenir les détails du film en utilisant la fonction fetchMovieDetails
        $movieDetails = fetchMovieDetails($movieId);
        
        // Vérifier si le film a bien été trouvé
        if (empty($movieDetails)) {
            echo "Film non trouvé.";
            return;
        }
        
        // Inclure la vue pour afficher les détails
        //  include 'DetailsMovie.php';
    }
}
