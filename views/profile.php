<?php require 'partials/header.php'; ?>

<main>
    <div class="username-Container">
        <div class="profile-wrapper">
            <img src="public/img/ModifierProfile.png" alt="Background" class="background">
            <div class="userNom"><?= htmlspecialchars($user['alias']) ?></div>

            <div id="profile-details" class="username-form">
                <div class="input-row">
                    <p>Nom:</p>
                    <p><?= htmlspecialchars($user['nom']) ?></p>
                </div>
                <div class="input-row">
                    <p>Prénom:</p>
                    <p><?= htmlspecialchars($user['prenom']) ?></p>
                </div>
                <div class="input-row">
                    <p>Mot de passe:</p>
                    <p>*******</p>
                </div>
                <button type="button" onclick="showForm()" class="username-btn">Modifier</button>
            </div>

            <form id="profile-form" class="username-form" method="post" action="/profile" style="display: none;">
                <div class="input-row">
                    <p>Nom:</p>
                    <input type="text" name="nom" class="username-input" value="<?= htmlspecialchars($user['nom']) ?>"
                        required>
                </div>
                <div class="input-row">
                    <p>Prénom:</p>
                    <input type="text" name="prenom" class="username-input"
                        value="<?= htmlspecialchars($user['prenom']) ?>" required>
                </div>
                <div class="input-row">
                    <p>Mot de passe:</p>
                    <input type="password" name="mot_de_passe" class="username-input" placeholder="Nouveau mot de passe">
                </div>
                <div class="button-row">
                    <button type="submit" class="enregistrer-btn">Enregistrer</button>
                    <button type="button" onclick="hideForm()" class="annuler-btn">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function showForm() {
        document.getElementById('profile-details').style.display = 'none';
        document.getElementById('profile-form').style.display = 'flex';
    }

    function hideForm() {
        document.getElementById('profile-details').style.display = 'flex';
        document.getElementById('profile-form').style.display = 'none';
    }
</script>

<?php require 'partials/footer.php'; ?>