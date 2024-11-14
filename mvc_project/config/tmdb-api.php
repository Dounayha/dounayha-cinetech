<?php

define('TMDB_API_KEY', '17538af04c6968278e2b5f0b1db58ba50');

// Fonction pour obtenir les films populaires
function fetchPopularMovies() {
    $url = "https://api.themoviedb.org/3/movie/popular?api_key=" . TMDB_API_KEY . "&language=fr-FR";
    
    // Exécuter la requête
    $response = file_get_contents($url);
    
    // Décoder la réponse JSON en tableau associatif PHP
    $data = json_decode($response, true);
    
    // Retourner les films populaires
    return $data['results'] ?? [];
}

// Fonction pour obtenir les détails d'un film par son ID
function fetchMovieDetails($movieId) {
    $url = "https://api.themoviedb.org/3/movie/$movieId?api_key=" . TMDB_API_KEY . "&language=fr-FR";
    
    // Exécuter la requête
    $response = file_get_contents($url);
    
    // Décoder la réponse JSON en tableau associatif PHP
    $data = json_decode($response, true);
    
    // Retourner les détails du film
    return $data ?? [];
}
