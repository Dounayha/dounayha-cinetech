<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($movieDetails['title']); ?> - Détails du Film</title>
</head>
<body>
    <h1><?= htmlspecialchars($movieDetails['title']); ?></h1>
    <p><strong>Description :</strong> <?= htmlspecialchars($movieDetails['overview']); ?></p>
    <p><strong>Date de sortie :</strong> <?= htmlspecialchars($movieDetails['release_date']); ?></p>
    <p><strong>Note moyenne :</strong> <?= htmlspecialchars($movieDetails['vote_average']); ?> / 10</p>
    <img src="https://image.tmdb.org/t/p/w500<?= htmlspecialchars($movieDetails['poster_path']); ?>" alt="Affiche de <?= htmlspecialchars($movieDetails['title']); ?>">
</body>
</html>
