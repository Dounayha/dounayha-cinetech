<form action="index.php?action=register" method="POST">
    <h2>Inscription</h2>
    <input type="text" name="username" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
    <button type="submit">S'inscrire</button> 
    <button type="button" onclick="window.location.href='index.php?action=login'">Ou se connecter</button>
</form>
