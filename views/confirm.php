<?php
    require 'partials/header.php';
?>

<main>
    <form method="POST">
        <div class="info-container">
            <div>
                <span class="confirm-text"><?= $info['message'] ?></span>
                <div class="info-button-container">
                    <button type="submit" name="back" class="btn btn-primary info-button">Retour</button>
                    <?php if($info['confirm']) { ?>
                        <button type="submit" name="confirm" value="Annuler" class="btn btn-primary info-button">Confirmer</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>

</main>

<?php require 'partials/footer.php'; ?>
