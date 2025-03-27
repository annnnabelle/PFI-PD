<?php 
    require 'partials/header.php'; 
?>

<main>
    <div class="background">
        <h1>Panier</h1>
    </div>
    <div class="cart-border">
        <div class="cart-container">
            <a href="/">&larr; Retour</a>
            <div class="cart-items">
            <?php if (!empty($panier)): ?>
                <?php foreach ($panier as $panierItem): ?>
                        <div class="cart-item">
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?= $panierItem['idItems'] ?>">
                                <button type="submit" class="garbage-btn" name="Supprimer" value="<?php $panierItem['idItems']?>">
                                    <img src="/public/img/Garbage_can.png" alt="Delete">
                                </button>
                            </form>
                            <img class="cart-item-img" src="<?= $panierItem['photo'] ?>" alt="<?= $panierItem['nom'] ?>">
                            <div class="item-details">
                                <div><?= $panierItem['nom'] ?></div>
                                <div class="detail-values">
                                    <img class="detail-symbol" src="/public/img/weight">
                                    <span><?= $panierItem['poids'] ?> lbs</span>
                                </div>
                                <div class="detail-values">
                                    <img class="detail-symbol" src="/public/img/gold">
                                    <span><?= $panierItem['prix'] ?> gold</span>
                                </div>
                                <span class="type"><?= $panierItem['type'] ?></span>
                                <div>Qte: <?= $panierItem['quantite'] ?></div>
                            </div>
                        </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Le panier est vide</p>
            <?php endif; ?>
            </div>
        </div>
        <div class="cart-summary">
            <div class="stats">
                <div>
                    <img class="symbol" src="/public/img/Weight">
                    <span><?= $poidstotal ?> lbs</span>
                </div>
                <div>
                    <img class="symbol" src="/public/img/Gold">
                    <span><?= $prixtotal ?> gold</span>
                </div>
            </div>
            <form method="post" onsubmit="return confirmAchat()">
                <input type="hidden" name="Acheter">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
    </div>
</main>

<script>
    function confirmAchat() {
        return confirm("Êtes-vous sûr de vouloir acheter ces articles ?");
    }
</script>

<?php require 'partials/footer.php'; ?>