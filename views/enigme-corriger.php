<?php
require 'partials/header.php';
?>

<main class="enigme-background">
    <div class="enigme-bubble">

        <div class="enigme-bubble-header">
            <?php if (isset($_SESSION['vie_message'])): ?>
                <p>
                    <?php echo $_SESSION['vie_message']; ?>
                </p>
                <?php unset($_SESSION['vie_message']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['answer_feedback'])): ?>
                <p class="<?php echo $_SESSION['answer_feedback'] === 'Correct!' ? 'correct-text' : 'incorrect-text'; ?>">
                    <?php echo $_SESSION['answer_feedback']; ?>
                </p>
                <?php unset($_SESSION['answer_feedback']); ?>
                <?php unset($_SESSION['bonne_reponse']); ?>
            <?php else: ?>
                <p>Résultat de votre réponse...</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="img-enigme">
    <div>
        <a href="/enigme" value="retour">
            <img src="public/img/catfish.png" alt="catfish">
            <p>Retour</p>
        </a>
    </div>
    <div>
        <?php if (!empty($_SESSION['plus_de_vie'])): ?>
            <div style="opacity: 0.5; pointer-events: none;">
                <img src="public/img/flounder.png" alt="flounder">
                <p>Continuer</p>
            </div>
        <?php else: ?>
            <a href="/enigme-questions?difficulte=<?php echo $_SESSION['current_difficulte'] ?? ''; ?>" value="Continuer">
                <img src="public/img/flounder.png" alt="flounder">
                <p>Continuer</p>
            </a>
        <?php endif; ?>
    </div>
</div>

</main>

<?php require 'partials/footer.php'; ?>