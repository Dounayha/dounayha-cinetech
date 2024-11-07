<?php
namespace App\Controllers;

use App\Views\View;

class HomeController {
    public function index() {
        $apiKey = 'bdeb16b1d565efdcd54849aed1d106ca';  
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
