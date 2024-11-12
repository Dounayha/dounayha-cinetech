<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css?v=<?= time() ?>">
    <title><?= htmlspecialchars($title) ?></title>
</head>
<body>
<h1><?= isset($movie['title']) ? htmlspecialchars($movie['title']) : 'Titre non disponible' ?></h1>

<?php if (!empty($movie)): ?>
    <div class="movie-details">
        <p><strong>Description :</strong> <?= htmlspecialchars($movie['overview']) ?></p>
        <p><strong>Date de sortie :</strong> <?= htmlspecialchars($movie['release_date']) ?></p>
        <p><strong>Note :</strong> <?= htmlspecialchars($movie['vote_average']) ?> / 10</p>

        <!-- Afficher l'image du film -->
        <?php if (isset($movie['poster_path'])): ?>
            <img src="https://image.tmdb.org/t/p/w300<?= htmlspecialchars($movie['poster_path']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
        <?php else: ?>
            <p>Aucune image disponible.</p>
        <?php endif; ?>

        <!-- Afficher les réalisateurs -->
        <p><strong>Réalisateur(s) :</strong>
            <?php
                if (isset($movie['credits']['crew'])) {
                    $directors = array_filter($movie['credits']['crew'], function($crew) {
                        return $crew['job'] === 'Director';
                    });
                    if (!empty($directors)) {
                        echo implode(', ', array_map(function($director) { return $director['name']; }, $directors));
                    } else {
                        echo 'Inconnu';
                    }
                } else {
                    echo 'Inconnu';
                }
            ?>
        </p>

        <!-- Afficher les acteurs -->
        <p><strong>Acteur(s) :</strong>
            <?php
                if (isset($movie['credits']['cast'])) {
                    // Récupère les 5 premiers acteurs
                    $actors = array_slice($movie['credits']['cast'], 0, 5);
                    echo implode(', ', array_map(function($actor) { return $actor['name']; }, $actors));
                    if (count($movie['credits']['cast']) > 5) {
                        echo " et d'autres...";
                    }
                } else {
                    echo 'Aucun acteur disponible';
                }
            ?>
        </p>

    </div>
<?php else: ?>
    <p>Détails du film non disponibles.</p>
<?php endif; ?>

</body>
</html>
