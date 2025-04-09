<?php
require 'partials/header.php';
?>

<main class="enigme-background">
    <div class="enigme-bubble">
        <a href="/">&larr; Retour</a>
        <p>Bienvenue à Enigma, voyageur des arcanes oubliées...</p>
        <p>Avant que l’aventure ne commence,</p>
        <p>un choix s’impose à toi</p>
        <br>
        <p>Fais ton choix avec sagesse... ou audace !</p>
    </div>

    <div class="img-enigme">
        <div>
            <a href="/enigme-difficulter" value="difficulter">
                <img src="public/img/catfish.png" alt="catfish">
                <p>Difficulté</p>
            </a>
        </div>
        <div>
            <a href="/enigme-questions" value="aleatoire">
                <img src="public/img/flounder.png" alt="flounder">
                <p>Aléatoire</p>
            </a>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>