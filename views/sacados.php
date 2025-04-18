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
                            <form method="post" >
                                <input type="hidden" name="itemId" value="<?= $item['idItems'] ?>">
                                <div class="sell-button-container">
                                    <span class="backpack-span">Quantité: </span>
                                        <select id="quantity" name="quantityUsed" class="backpack-select">
                                            <?php for ($i = 1; $i <= $item['quantite']; $i++) { ?>
                                                <option value="<?=$i?>"><?=$i?></option>
                                            <?php } ?>
                                        </select>
                                    <?php if ($item['type'] == 'Nourriture' || $item['type'] == 'Médicament') { ?>
                                        <input type="hidden" name="itemType" value="<?= $item['type'] ?>">
                                        <button type="submit" name="eat" class="consumable-button">Consommer</button>
                                        <button type="submit" name="sell" class="consumable-sell-button">Vendre</button>
                                    <?php } else { ?>
                                        <button type="submit" name="sell" class="sell-button">Vendre</button>
                                    <?php } ?>
                                </div>
                            </form>
                            
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
                        <span><?= $poidstotal ?>/<?=$poids_max['poids_max'] ?> lbs</span>
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