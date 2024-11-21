<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css?v=<?= time() ?>">

    <title><?= htmlspecialchars($title) ?></title>
</head>
<body>
    <div class="series-details">
        <h1 class="series-title"><?= htmlspecialchars($series['name']) ?></h1>

        <!-- Image de la série -->
        <div class="series-poster">
            <?php if (isset($series['poster_path'])): ?>
                <img src="https://image.tmdb.org/t/p/w500<?= htmlspecialchars($series['poster_path']) ?>" alt="<?= htmlspecialchars($series['name']) ?>" class="poster-image">
            <?php else: ?>
                <p class="no-image">Aucune image disponible.</p>
            <?php endif; ?>
        </div>

        <!-- Description -->
        <p class="series-overview"><strong>Description :</strong> <?= htmlspecialchars($series['overview']) ?></p>

        <!-- Informations supplémentaires -->
        <p class="series-info"><strong>Première diffusion :</strong> <?= htmlspecialchars($series['first_air_date']) ?></p>
        <p class="series-info"><strong>Nombre de saisons :</strong> <?= htmlspecialchars($series['number_of_seasons']) ?></p>
        <p class="series-info"><strong>Nombre d'épisodes :</strong> <?= htmlspecialchars($series['number_of_episodes']) ?></p>

        <!-- Acteurs principaux -->
        <h2 class="cast-title">Acteurs principaux</h2>
        <?php if (!empty($series['credits']['cast'])): ?>
            <!-- <ul class="cast-list"> -->
                <?php foreach (array_slice($series['credits']['cast'], 0, 5) as $actor): ?>
                    <p class="cast-member"><?= htmlspecialchars($actor['name']) ?> (<?= htmlspecialchars($actor['character']) ?>)</p>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="no-actors">Aucun acteur disponible.</p>
        <?php endif; ?>

        <!-- Créateurs -->
        <h2 class="crew-title">Créateurs</h2>
        <?php if (!empty($series['credits']['crew'])): ?>
            <ul class="crew-list">
                <?php foreach ($series['credits']['crew'] as $crewMember): ?>
                    <?php if ($crewMember['job'] === 'Creator'): ?>
                        <li class="crew-member"><?= htmlspecialchars($crewMember['name']) ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="no-creators">Aucun créateur disponible.</p>
        <?php endif; ?>
    </div>
</body>
</html>
