<?php
require 'partials/header.php';
?>

<main class="enigme-background">

    <div class="enigme-bubble">
        <div class="enigme-bubble-header">
            <a href="/enigme">&larr; Retour</a>
            <p> Voici la question: </p>
            <br>
            <p><?php echo htmlspecialchars($question); ?></p><br>
        </div>
    </div>
    <div class="enigme-question">
        <form action="/enigme-corriger" method="post" class="answer-grid">
                <?php if (!empty($answers) && count($answers) >= 4): ?>
                    <button type="submit" name="answer" value="<?php echo htmlspecialchars($answers[0]['reponse']); ?>">
                        <img src="public/img/Lionfish.jpeg" alt="reponse 1">
                        <p><?php echo htmlspecialchars($answers[0]['reponse']); ?></p>
                    </button>
                    <button type="submit" name="answer" value="<?php echo htmlspecialchars($answers[1]['reponse']); ?>">
                        <img src="public/img/Blue_Discus.jpeg" alt="reponse 2">
                        <p><?php echo htmlspecialchars($answers[1]['reponse']); ?></p>
                    </button>
                    <button type="submit" name="answer" value="<?php echo htmlspecialchars($answers[2]['reponse']); ?>">
                        <img src="public/img/Pufferfish.png" alt="reponse 3">
                        <p><?php echo htmlspecialchars($answers[2]['reponse']); ?></p>
                    </button>
                    <button type="submit" name="answer" value="<?php echo htmlspecialchars($answers[3]['reponse']); ?>">
                        <img src="public/img/squid.png" alt="reponse 4">
                        <p><?php echo htmlspecialchars($answers[3]['reponse']); ?></p>
                    </button>
                <?php endif; ?>

            <input type="hidden" name="enigme_id" value="<?php echo $_SESSION['current_enigme_id'] ?? ''; ?>">
        </form>
    </div>
</main>

<?php require 'partials/footer.php'; ?>