<?php
require 'partials/header.php';
?>

<main class="enigme-background">
    <div class="enigme-bubble">
        <div class="enigme-bubble-header">
            <p>Ah… ainsi, ma dernière énigme s'effondre,</p>
            <p> brisée par ton esprit. Tu m’as vaincu </p>
            <p>Je suis défait ! Ma magie chancelle face à ta lumière…</p>
            <br>
            <p>Adieu, voyageur. Tu as vaincu le sorcier des énigmes.</p>
        </div>
    </div>


    <div class="img-enigme">
        <div>
            <a href="/">
                <img src="public/img/Green-fish.png" alt="catfish">
                <p>Retour</p>
            </a>
        </div>
        <div>
            <form action="<?=recommencerEnigme($pdo)?>" method="post">
                    <a href="/enigme-recommencer">
                        <img src="public/img/Albacore.png" alt="catfish">
                        <p>Rejouer</p>
                    </a>
            </form>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>