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
                <?php foreach ($testData as $key => $item) { ?>
                    <div class="cart-item">
                        <button class="garbage-btn">
                            <img src="/public/img/Garbage_can.png" alt="Delete">
                        </button>
                        <img class="cart-item-img" src="<?= $item['img'] ?>" alt="Fishing Rod">
                        <div class="item-details">
                            <div><?= $item['title'] ?></div>
                            <div>
                                <img class="symbol" src="/public/img/Weight">
                                <span class="value"><?= $item['weight'] ?> lbs</span>
                            </div>
                            <div>
                                <img class="symbol" src="/public/img/Gold">
                                <span class="value"><?= $item['price'] ?> gold</span>
                            </div>
                            <span class="type"><?= $item['type'] ?></span>
                            <div>Qte: <?= $item['qty'] ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="cart-summary">
            <div class="details">
                <div>
                    <img class="symbol" src="/public/img/Weight">
                    <span class="value"><?= $item['weight'] ?> lbs</span>
                </div>
                <div>
                    <img class="symbol" src="/public/img/Gold">
                    <span class="value"><?= $item['price'] ?> gold</span>
                </div>
            </div>
            <button class="buy-button">Acheter</button>
        </div>
    </div>
</main>


<?php require 'partials/footer.php'; ?>