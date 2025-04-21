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
        <form action="/enigme-questions" method="get">
            <button type="submit" name="F" value="F">
                <img src="public/img/Legend_II.png" alt="catfish">
                <p>Facile</p>
            </button>
            <button type="submit" name="M" value="true">
                <img src="public/img/Son_of_Crimsonfish.png" alt="flounder">
                <p>Moyen</p>
            </button>
            <button type="submit" name="D" value="true">
                <img src="public/img/Midnight_Carp.png" alt="Pufferfish">
                <p>Difficile</p>
            </button>
        </form>
    </div>

</main>

<?php require 'partials/footer.php'; ?>