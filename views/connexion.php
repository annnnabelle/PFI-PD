<?php
require 'partials/header.php';
?>

<main>
    <div>
        <a href="/">&larr; Retour</a>
        <br>
        <label for="alias">Alias:</label>
        <input type="text" id="alias" name="alias" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Connexion</button>
    </div>
</main>

<?php require 'partials/footer.php'; ?>