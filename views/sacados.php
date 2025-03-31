<?php
require 'partials/header.php';
?>

<main>
    <div class="background">
        <h1>Sac-a-dos</h1>
    </div>
    <div class="cart-border">
        <div class="cart-container">
            <a href="/">&larr; Retour</a>
            <div class="cart-items">
                <?php if (!empty($sacADos)): ?>
                    <?php foreach ($sacADos as $key => $item) { ?>

                        <div class="backpack-item">
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?= $item['idItems'] ?>">
                                <button type="submit" class="garbage-btn" name="Supprimer" value="<?php $item['idItems'] ?>">
                                    <img src="/public/img/Garbage_can.png" alt="Delete">
                                </button>
                            </form>
                            <img class="cart-item-img" src="<?= $item['photo'] ?>">
                            <div class="item-details">
                                <div><?= $item['nom'] ?></div>
                                <div class="detail-values">
                                    <img class="detail-symbol" src="/public/img/weight">
                                    <span><?= $item['poids'] ?> lbs</span>
                                </div>
                                <div class="detail-values">
                                    <img class="detail-symbol" src="/public/img/gold">
                                    <span><?= $item['prix'] ?> gold</span>
                                </div>
                                <span class="type"><?= $item['type'] ?></span>
                                <div>Qte: <?= $item['quantite'] ?></div>

                            </div>
                            <div class="sell-button-container">
                                <span class="backpack-span">Quantité: </span>
                                <select id="quantity" name="quantity" class="backpack-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <button class="sell-button">Vendre</button>
                            </div>
                        </div>
                    <?php } ?>
                <?php else: ?>
                    <p>Le sac-a-dos est vide</p>
                <?php endif; ?>
            </div>
            <div class="backpack_summary">
                <div class="stats">
                    <div>
                        <img class="symbol" src="/public/img/Weight">
                        <span><?= $poidstotal ?> lbs / <?=$poids_max['poids_max'] ?></span>
                    </div>
                </div>
            </div>
        </div>
</main>

<script>
    const basePrice = <?= $item['prix'] ?>;

    function updateTotalPrice() {
        const quantity = document.getElementById('quantity').value;
        const totalPrice = basePrice * quantity;
        document.getElementById('total-price').textContent = totalPrice;
    }

    updateTotalPrice();
</script>


<?php require 'partials/footer.php'; ?>