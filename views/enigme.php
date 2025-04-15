<?php
require 'partials/header.php';
?>

<main class="enigme-background">
    <div class="enigme-bubble">
        <a href="/">&larr; Retour</a>
        <?php if (isset($_SESSION['enigme_termine']) && $_SESSION['enigme_termine'] === true): ?>
            <p>Vous avez déjà terminé toutes les énigmes !</p>
            <p>Merci d'avoir participé.</p>
        <?php else: ?>
            <p>Bienvenue à Enigma, voyageur des arcanes oubliées...</p>
            <p>Avant que l’aventure ne commence,</p>
            <p>un choix s’impose à toi</p>
            <br>
            <p>Fais ton choix avec sagesse... ou audace !</p>
        <?php endif; ?>
    </div>

    <div class="img-enigme">
        <?php if (!isset($_SESSION['enigme_termine']) || $_SESSION['enigme_termine'] === false): ?>
            <div>
                <a href="/enigme-difficulter" value="difficulter">
                    <img src="public/img/catfish.png" alt="catfish">
                    <p>Difficulté</p>
                </a>
            </div>
            <div>
                <a href="/enigme-questions?aleatoire=true" value="aleatoire">
                    <img src="public/img/flounder.png" alt="flounder">
                    <p>Aléatoire</p>
                </a>
            </div>
        <?php endif; ?>
        <?php if (!isset($_SESSION['reset_clicked'])): ?>
            <div>
                <a href="/enigme-recommencer" value="reset">
                    <img src="public/img/Octopus.png" alt="Octopus">
                    <p>Réinitialiser la partie</p>
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require 'partials/footer.php'; ?>