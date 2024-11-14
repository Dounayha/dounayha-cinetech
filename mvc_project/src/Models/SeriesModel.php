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
}
