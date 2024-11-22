<!-- header.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon site de films' ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Pour autocomplétion -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> <!-- Pour autocomplétion -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="./public/style.css?v=<?= time() ?>">
    </head>
<body>
    <!-- Barre de navigation -->
    <header>
    <nav>
        <!-- Bouton burger pour mobile -->
        <div class="burger-menu" onclick="toggleMenu()">
            &#9776; <!-- Icône burger -->
        </div>

        <!-- Liste des liens du menu -->
        <ul class="nav-links">
            <li><a href="index.php?action=home">Accueil</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Films</a>
                <div class="dropdown-content">
                    <a href="index.php?action=all_movies">Tous les films</a>
                    <a href="?action=movie&genre=28">Action</a>
                    <a href="?action=movie&genre=16">Animation</a>
                    <a href="?action=movie&genre=878">Science Fiction</a>
                    <a href="?action=movie&genre=35">Comédie</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Séries</a>
                <div class="dropdown-content">
                    <a href="?action=series">Toutes les Séries</a>
                    <a href="?action=series&genre=18">Drame</a>
                    <a href="?action=series&genre=10765">Fantastique</a>
                    <a href="?action=series&genre=10749">Romance</a>
                </div>
            </li>
            <li>
                <input type="text" id="search" placeholder="Rechercher..." class="search-bar">
            </li>
            <li><a href="index.php?action=register" class="login-btn">S'identifier</a></li>
        </ul>
    </nav>
</header>

    
      <script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }
</script>

</body>
</html>
