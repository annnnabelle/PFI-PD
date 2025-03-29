<?php
    require 'partials/header.php';
?>

<main>
    <form method="POST">
        <div class="info-container">
            <div>
                <span class="confirm-text"><?= $info['message'] ?></span>
                <div class="info-button-container">
                    <input type="submit" name="back" value="Annuler" class="btn btn-primary info-button">
                    <?php if($info['confirm']) { ?>
                        <input type="submit" name="confirm" value="Confirmer" class="btn btn-primary info-button">
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>

</main>

<?php require 'partials/footer.php'; ?>
