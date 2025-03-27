<?php
require 'partials/header.php';
?>

<main>
    <div class="inscription-container">
        <a href="/" class="return">&larr; Retour</a>
        <form method="POST">
            <label for="alias">Alias:</label>
            <input  type="text" id="alias" name="alias" value="<?= htmlspecialchars($data['alias'] ?? '') ?>">
            <span><?= $errors['alias'] ?? '' ?></span>
            
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($data['prenom'] ?? '') ?>">
            <span><?= $errors['prenom'] ?? '' ?></span>
            
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($data['nom'] ?? '') ?>">
            <span><?= $errors['nom'] ?? '' ?></span>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
            <span><?= $errors['password'] ?? '' ?></span>

            <button type="submit" class="inscription-btn">Inscription</button>

            <?php if (!empty($errors['global'])): ?>
                <span class="error"><?= $errors['global'] ?></span>
            <?php endif; ?>
        </form>
    </div>
</main>

<?php require 'partials/footer.php'; ?>
