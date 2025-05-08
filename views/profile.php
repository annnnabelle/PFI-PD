<?php require 'partials/header.php'; ?>

<main>
    <img src="public/img/ModifierProfile.png" alt="Background" class="background">
    
    <div><?= htmlspecialchars($user['alias']) ?></div>

    <div class="profile-container">
        <div class="profile-info">
            <p>Nom: <?= htmlspecialchars($user['nom']) ?></p>
            <p>Prénom: <?= htmlspecialchars($user['prenom']) ?></p>
        </div>

        <form method="post" action="/profile">
            <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
            <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
            <input type="password" name="mot_de_passe" placeholder="Nouveau mot de passe" required>
            <button type="submit" class="btn">Modifier le profil</button>
        </form>
    </div>
</main>

<?php require 'partials/footer.php'; ?>
