<?php
require 'partials/header.php';
?>

<main class="enigme-background">

    <div class="enigme-bubble">
        <a href="/enigme">&larr; Retour</a>
        <p>
            Ah, brave âme en quête de sagesse! <br>
            Le chemin qui s'offre à toi se divise en trois voies mystérieuses...
        </p>
        <p>Choisis avec prudence, <br>car le niveau de défi façonnera ton destin!</p>
    </div>
    <div class="img-enigme">
        <div value="Facile">
            <a href="/enigme-questions">
                <img src="public/img/Lionfish.jpeg" alt="catfish">
                <p>
                    Facile
                </p>
            </a>
        </div>
        <div value="Moyen">
            <a href="/enigme-questions">
                <img src="public/img/Blue_Discus.jpeg" alt="flounder">
                <p>
                    Moyen
                </p>
            </a>
        </div>
        <div value="Difficile">
            <a href="/enigme-questions">
                <img src="public/img/Pufferfish.png" alt="Pufferfish">
                <p>
                    Difficile
                </p>
            </a>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>