<?php require 'partials/header.php'; ?>

<main>
    <div class="background">
        <h1>Panier</h1>
    </div>
    <div class="cart-border">
        <div class="cart-container">
            <a href="/">&larr; Retour</a>
            <?php if (!empty($panier)): ?>
                <?php foreach ($panier as $panierItem): ?>
                    <div class="cart-items">
                        <div class="cart-item">
                            <form method="post">
                                <input type="hidden" name="item_name" value="<?= $panierItem['name'] ?>">
                                <button class="garbage-btn" type="submit" name="Supprimer">
                                    <img src="/public/img/Garbage_can.png" alt="Delete">
                                </button>
                            </form>
                            <img class="cart-item-img" src="<?= $panierItem['img'] ?>" alt="<?= $panierItem['name'] ?>">
                            <div class="item-details">
                                <div><?= $panierItem['title'] ?></div>
                                <div class="detail-values">
                    <img class="detail-symbol" src="/public/img/weight">
                    <span><?=$item['weight']?> lbs</span>
                </div>
                <div class="detail-values">
                    <img class="detail-symbol" src="/public/img/gold">
                    <span><?=$item['price']?> gold</span>
                </div>
                                <span class="type"><?= $panierItem['type'] ?></span>
                                <div>Qte: <?= $panierItem['qty'] ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Le panier est vide</p>
            <?php endif; ?>
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