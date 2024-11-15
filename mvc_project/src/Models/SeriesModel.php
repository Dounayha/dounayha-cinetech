<?php
namespace App\Models;

class SeriesModel {
    private $apiKey = '17538af04c6968278e2b5f0b1db58ba5';
    private $apiBaseUrl = 'https://api.themoviedb.org/3';

    public function getAllSeries() {
        $url = "{$this->apiBaseUrl}/tv/popular?api_key={$this->apiKey}&language=fr-FR";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return $data['results'];
    }

    public function getSeriesByCategory($genreId) {
        $url = "{$this->apiBaseUrl}/discover/tv?api_key={$this->apiKey}&language=fr-FR&with_genres=$genreId";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return $data['results'];
    }

    public function getSeriesDetails($id) {
        // URL de l'API pour les détails de la série
        $url = "{$this->apiBaseUrl}/tv/{$id}?api_key={$this->apiKey}&language=fr-FR";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
    
        // Récupérer les crédits (acteurs et créateurs)
        $creditsUrl = "{$this->apiBaseUrl}/tv/{$id}/credits?api_key={$this->apiKey}&language=fr-FR";
        $creditsResponse = file_get_contents($creditsUrl);
        $creditsData = json_decode($creditsResponse, true);
    
        // Ajouter les crédits aux données de la série
        $data['credits'] = $creditsData;
    
        return $data; // Retourne les détails de la série avec les crédits
    }
    
}
