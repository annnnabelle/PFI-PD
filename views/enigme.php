<?php
require 'partials/header.php';
?>

<main class="enigme-background">

    <div class="enigme-bubble">
        <p>
        Bienvenue à Enigma, voyageur des arcanes oubliées...<br>
        Avant que l’aventure ne commence, <br>un choix s’impose à toi.
        <br><br><br>Fais ton choix avec sagesse... ou audace !</p>
    </div>
    <div class="img-enigme">
        <div>
            <a href="/enigme-questions">
                <img src="public/img/catfish.png" alt="catfish">
                <p>Difficulté</p>
            </a>
        </div>
        <div>
            <a href="/enigme-questions">
                <img src="public/img/flounder.png" alt="flounder">
                <p>Aléatoire</p>
            </a>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>