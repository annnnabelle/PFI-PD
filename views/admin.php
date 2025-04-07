<?php
require 'partials/header.php';
?>

<main>

    <div class="user-container">
        
       
    
    <a href="/">&larr; Retour</a>
        <div class="background-admin">
        
        <h1>Section admin</h1>
        </div>
      

        <?php foreach ($users as $user) { ?>
            <form method="post">
            <div class="admin-user">

                <input type="hidden" name="user_id" value="<?= $user['idJoueurs'] ?>">

                <div class="user-details">
                    <div><?= $user['alias'] ?>     <?= $user['prenom'] ?>     <?= $user['nom'] ?></div>
                    <div>caps augmentés : <?= $user['caps_augmenter'] ?> fois</div>
                    <?php if ($user['caps_augmenter'] < 3): ?>
                        <input type="submit" name="augmenter" class="augmenter-button" value="Augmenter Caps">
                <?php endif; ?>

                </div>




            </div>
            </form>
        <?php } ?>
    </div>



</main>


<?php require 'partials/footer.php'; ?>