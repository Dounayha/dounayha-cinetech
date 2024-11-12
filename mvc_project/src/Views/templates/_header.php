<!-- header.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon site de films' ?></title>
    <link rel="stylesheet" href="/public/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Pour autocomplétion -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> <!-- Pour autocomplétion -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="./public/style.css?v=<?= time() ?>">
    </head>
<body>
    <!-- Barre de navigation -->
    <header>
        <nav>
            <ul>
            <a href="/dounayha-cinetech/mvc_project/#">Accueil</a>
                
                <!-- Menu déroulant pour les catégories -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">Catégorie</a>
                    <div class="dropdown-content">
                        <a href="/movies">Films</a>
                        <a href="/series">Séries</a>
                    </div>
                </li>
                
                <!-- Barre de recherche avec autocomplétion -->
                <li>
                    <input type="text" id="search" placeholder="Rechercher..." class="search-bar">
                </li>
                
                <!-- Bouton de connexion -->
                <li><a href="/login" class="login-btn">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <script>
        // Script pour l'autocomplétion de la barre de recherche
        $(document).ready(function() {
            var availableTags = [
                "Animation", "Horreur", "Science Fiction", "Action", "Comédie", "Drame", "Aventure", "Romance"
            ]; // Exemple de catégories, vous pouvez les adapter à votre besoin
            
            $("#search").autocomplete({
                source: availableTags
            });
        });
    </script>
</body>
</html>
