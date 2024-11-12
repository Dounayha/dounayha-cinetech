<?php
namespace App\Controllers;

use App\Views\View;

class HomeController {
    public function index() {
        $apiKey = '17538af04c6968278e2b5f0b1db58ba5';  
        $movies = $this->fetchPopularMovies($apiKey);

        $view = new View();
        $view->render('home', [
            'title' => 'Films Populaires',
            'movies' => $movies
        ]);
    }

    private function fetchPopularMovies($apiKey) {
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=$apiKey&language=fr-FR";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        return $data['results'] ?? [];
    }
}