<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($title) ?></h1>

    <div class="series-grid">
        <?php foreach ($series as $serie): ?>
            <div class="series-card">
                <!-- Affiche l'image de la série si disponible -->
                <a href="index.php?action=series&id=<?= htmlspecialchars($serie['id']) ?>">
                <?php if (!empty($serie['poster_path'])): ?>
                    <img src="https://image.tmdb.org/t/p/w300<?= htmlspecialchars($serie['poster_path']) ?>" alt="<?= htmlspecialchars($serie['name']) ?>">
                <?php else: ?>
                    <p>Aucune image disponible.</p>
                <?php endif; ?>

                <h2><?= htmlspecialchars($serie['name']) ?></h2>

            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
