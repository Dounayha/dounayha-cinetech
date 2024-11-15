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
            <?php if (isset($movie['poster_path'])): ?>
                <a href="?action=movie&id=<?= htmlspecialchars($movie['id']) ?>">
                    <img src="https://image.tmdb.org/t/p/w300<?= htmlspecialchars($movie['poster_path']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
                </a>
            <?php endif; ?>
            <h3><a href="?action=movie&id=<?= htmlspecialchars($movie['id']) ?>"><?= htmlspecialchars($movie['title']) ?></a></h3>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
