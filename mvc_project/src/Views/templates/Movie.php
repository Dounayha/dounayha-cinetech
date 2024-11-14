<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>
            <h1>Tous les films</h1>
    <div class="movies-grid">
        <?php foreach ($movies as $movie): ?>
            <div class="movie-card">
                <!-- Affiche l'image du film -->
                <?php if (isset($movie['poster_path'])): ?>
                    <img src="https://image.tmdb.org/t/p/w300<?= htmlspecialchars($movie['poster_path']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
                <?php else: ?>
                    <p>Aucune image disponible.</p>
                <?php endif; ?>
                
                <!-- Affiche le titre et un lien vers les détails -->
                <h3><?= htmlspecialchars($movie['title']) ?></h3>
                
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
