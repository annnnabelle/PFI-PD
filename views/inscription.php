<?php
require 'partials/header.php';
?>

<main>
    <div class="inscription-container ">
        <a href="/">&larr; Retour</a>
        <label for="alias">Alias:</label>
        <input type="text" id="alias" name="alias" required>
        <br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" class="inscription-btn">Inscription</button>
    </div>
</main>

<?php require 'partials/footer.php'; ?>