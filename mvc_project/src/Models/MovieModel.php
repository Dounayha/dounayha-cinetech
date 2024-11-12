<?php
// namespace App\Models;

// class MovieModel {
//     public function getMovieDetails($id) {
//         $TMDB_API_BASE_URL = "https://api.themoviedb.org/3";
//         $TMDB_API_KEY = "17538af04c6968278e2b5f0b1db58ba50"; 
//         // Récupérer les détails du film
//         $url = TMDB_API_BASE_URL . "/movie/$id?api_key=" . TMDB_API_KEY . "&language=fr-FR";
//         $response = file_get_contents($url);
//         $movieData = json_decode($response, true);
        
//         // Récupérer les crédits (réalisateurs et acteurs)
//         $creditsUrl = TMDB_API_BASE_URL . "/movie/$id/credits?api_key=" . TMDB_API_KEY . "&language=fr-FR";
//         $creditsResponse = file_get_contents($creditsUrl);
//         $creditsData = json_decode($creditsResponse, true);
        
//         // Ajouter les crédits aux données du film
//         $movieData['credits'] = $creditsData;
        
//         return $movieData;
//     }
// }
namespace App\Models;

class MovieModel {
    // Méthode pour récupérer tous les films populaires
    public function getAllMovies() {
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=17538af04c6968278e2b5f0b1db58ba5&language=fr-FR";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return $data['results']; // Retourne tous les films
    }

    // Méthode pour récupérer les films par catégorie
    public function getMoviesByCategory($category) {
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=17538af04c6968278e2b5f0b1db58ba5&language=fr-FR&with_genres=" . urlencode($category);
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return $data['results']; // Retourne les films filtrés par catégorie
    }

    // Méthode pour récupérer les détails d'un film
    public function getMovieDetails($id) {
        // Récupérer les détails du film
        $url = "https://api.themoviedb.org/3/movie/$id?api_key=17538af04c6968278e2b5f0b1db58ba5&language=fr-FR";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Récupérer les crédits (réalisateurs et acteurs)
        $creditsUrl = "https://api.themoviedb.org/3/movie/$id/credits?api_key=17538af04c6968278e2b5f0b1db58ba5&language=fr-FR";
        $creditsResponse = file_get_contents($creditsUrl);
        $creditsData = json_decode($creditsResponse, true);

        // Ajouter les crédits aux données du film
        $data['credits'] = $creditsData;
        
        return $data; // Retourne les détails du film, y compris les crédits
    }
}
