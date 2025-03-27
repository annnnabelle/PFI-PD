<?php
require 'partials/header.php';
?>

<main>
    <div class="inscription-container">
        <a href="/" class="return">&larr; Retour</a>
        <form method="POST">
            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" value="<?= htmlspecialchars($alias ?? '') ?>">
            <span><?= $errors['alias'] ?? '' ?></span>
            <br>
            <label for="password" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password">
            <span class="help-inline"><?= $errors['password'] ?? '' ?></span>
            <br>
            <button type="submit" class="connexion-btn">Connexion</button>
            <br>
            <?php if (!empty($errors['global'])): ?>
                <span class="error"><?= $errors['global'] ?></span>
            <?php endif; ?>
        </form>
    </div>
</main>

<?php require 'partials/footer.php'; ?>
