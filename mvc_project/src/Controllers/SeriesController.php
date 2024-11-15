<?php
namespace App\Controllers;

use App\Models\SeriesModel;
use App\Views\View;

class SeriesController {
    public function index() {
        $model = new SeriesModel();
        $series = $model->getAllSeries();

        $view = new View();
        $view->render('Series', [
            'title' => 'Toutes les séries',
            'series' => $series
        ]);
    }

    public function filterByGenre($genreId) {
        $model = new SeriesModel();
        $series = $model->getSeriesByCategory($genreId);

        $view = new View();
        $view->render('Series', [
            'title' => 'Séries par genre',
            'series' => $series
        ]);
    }

    public function show($id) {
        $model = new SeriesModel();
    
        // Récupérer les détails de la série
        $series = $model->getSeriesDetails($id);
    
        if ($series === null) {
            // Si la série n'a pas été trouvée, afficher un message d'erreur
            echo "Série non trouvée.";
            return;
        }
    
        // Créer une instance de la vue
        $view = new View();
    
        // Passer les détails de la série à la vue
        $view->render('SeriesDetails', [
            'title' => $series['name'],  // Nom de la série
            'series' => $series          // Détails de la série
        ]);
    }
    
}
