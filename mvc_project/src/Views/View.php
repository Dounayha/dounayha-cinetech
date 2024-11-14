<?php
namespace App\Views;

class View {
    public function render($viewName, $data = []) {
        extract($data);
        include 'src/Views/templates/_header.php';
        include __DIR__ . "/templates/$viewName.php";
        $templatePath = __DIR__ . "/templates";
       
    }
}

