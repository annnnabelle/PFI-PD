<?php
require 'partials/header.php';
?>

<main class="enigme-background">

    <div class="enigme-bubble">
        <a href="/enigme">&larr; Retour</a>
        <p> Voici la question: </p>
        <br>
        <p><?php echo htmlspecialchars($question); ?></p>
    </div>

    <div class="enigme-question">
        <?php if (!empty($answers) && count($answers) >= 4): ?>
            <div class="answer-option">
                <a href="/enigme-corriger?answer=<?php echo urlencode($answers[0]['reponse']); ?>&enigme_id=<?php echo $_SESSION['current_enigme_id'] ?? ''; ?>">
                    <img src="public/img/Lionfish.jpeg" alt="Answer 1">
                    <p><?php echo htmlspecialchars($answers[0]['reponse']); ?></p>
                </a>
            </div>
            <div class="answer-option">
                <a href="/enigme-corriger?answer=<?php echo urlencode($answers[1]['reponse']); ?>&enigme_id=<?php echo $_SESSION['current_enigme_id'] ?? ''; ?>">
                    <img src="public/img/Blue_Discus.jpeg" alt="Answer 2">
                    <p><?php echo htmlspecialchars($answers[1]['reponse']); ?></p>
                </a>
            </div>
            <div class="answer-option">
                <a href="/enigme-corriger?answer=<?php echo urlencode($answers[2]['reponse']); ?>&enigme_id=<?php echo $_SESSION['current_enigme_id'] ?? ''; ?>">
                    <img src="public/img/Pufferfish.png" alt="Answer 3">
                    <p><?php echo htmlspecialchars($answers[2]['reponse']); ?></p>
                </a>
            </div>
            <div class="answer-option">
                <a href="/enigme-corriger?answer=<?php echo urlencode($answers[3]['reponse']); ?>&enigme_id=<?php echo $_SESSION['current_enigme_id'] ?? ''; ?>">
                    <img src="public/img/squid.png" alt="Answer 4">
                    <p><?php echo htmlspecialchars($answers[3]['reponse']); ?></p>
                </a>
            </div>
        <?php elseif (!empty($answers)): ?>
            <p>Nombre insuffisant de réponses pour afficher les images.</p>
        <?php elseif (empty($answers) && $question !== "Aucune question disponible pour cette difficulté pour le moment."): ?>
            <p>Aucune réponse disponible pour cette question.</p>
        <?php elseif (empty($answers) && $question === "Aucune question disponible pour cette difficulté pour le moment."): ?>
            <p><?php echo $question; ?></p>
        <?php endif; ?>
    </div>
</main>

<?php require 'partials/footer.php'; ?>