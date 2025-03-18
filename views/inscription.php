<?php
require 'partials/header.php';
?>

<main>
    <div class="inscription-container">
        <a href="/">&larr; Retour</a>
        <form method="POST">
            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" value="<?= htmlspecialchars($data['alias'] ?? '') ?>" required>
            <span><?= $errors['alias'] ?? '' ?></span>
            <br>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($data['prenom'] ?? '') ?>" required>
            <span><?= $errors['prenom'] ?? '' ?></span>
            <br>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($data['nom'] ?? '') ?>" required>
            <span><?= $errors['nom'] ?? '' ?></span>
            <br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <span><?= $errors['password'] ?? '' ?></span>
            <br>
            <button type="submit" class="inscription-btn">Inscription</button>
            <br>
            <?php if (!empty($errors['global'])): ?>
                <span class="error"><?= $errors['global'] ?></span>
            <?php endif; ?>
        </form>
    </div>
</main>

<?php require 'partials/footer.php'; ?>
