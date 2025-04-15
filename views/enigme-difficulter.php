<?php
require 'partials/header.php';
?>

<main class="enigme-background">

    <div class="enigme-bubble">
        <a href="/enigme">&larr; Retour</a>
        <p>
            Ah, brave âme en quête de sagesse! <br>
            Le chemin qui s'offre à toi se divise en trois voies...
        </p>
        <p>Choisis avec prudence, <br>car le niveau de défi façonnera ton destin!</p>
    </div>
    <div class="img-enigme-difficulter">
        <div value="Facile">
            <a href="/enigme-questions?difficulte=F">
                <img src="public/img/Legend_II.png" alt="catfish">
                <p>
                    Facile
                </p>
            </a>
        </div>
        <div value="Moyen">
            <a href="/enigme-questions?difficulte=M">
                <img src="public/img/Son_of_Crimsonfish.png" alt="flounder">
                <p>
                    Moyen
                </p>
            </a>
        </div>
        <div value="Difficile">
            <a href="/enigme-questions?difficulte=D">
                <img src="public/img/Midnight_Carp.png" alt="Pufferfish">
                <p>
                    Difficile
                </p>
            </a>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>