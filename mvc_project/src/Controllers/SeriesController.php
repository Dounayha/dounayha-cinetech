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
}
