<h2>Profil</h2>
<p>Nom : <?= htmlspecialchars($user['name']) ?></p>
<p>Email : <?= htmlspecialchars($user['email']) ?></p>

<form action="index.php?action=profile" method="POST">
    <h3>Modifier vos informations</h3>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    <button type="submit">Mettre à jour</button>
</form>
