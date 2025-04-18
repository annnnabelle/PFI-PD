<?php
require 'partials/header.php';
?>

<main class="enigme-background">
    <div class="enigme-bubble">
        <?php if (isset($_SESSION['answer_feedback'])): ?>
            <p class="<?php echo $_SESSION['answer_feedback'] === 'Correct!' ? 'correct-text' : 'incorrect-text'; ?>">
                <?php echo $_SESSION['answer_feedback']; ?>
                <?php if ($_SESSION['answer_feedback'] === 'Incorrect! Reessayer, brave adventurer!' && isset($_SESSION['bonne_reponse']) && !empty($_SESSION['bonne_reponse'])): ?>
                <?php endif; ?>
            </p>
            <?php unset($_SESSION['answer_feedback']); ?>
            <?php unset($_SESSION['bonne_reponse']);?>
        <?php else: ?>
            <p>Résultat de votre réponse...</p>
        <?php endif; ?>
    </div>

    <div class="img-enigme">
        <div>
            <a href="/enigme" value="retour">
                <img src="public/img/catfish.png" alt="catfish">
                <p>Retour</p>
            </a>
        </div>
        <div>
            <a href="/enigme-questions" value="Continuer">
                <img src="public/img/flounder.png" alt="flounder">
                <p>Continuer</p>
            </a>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>