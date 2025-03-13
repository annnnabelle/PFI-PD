<?php
require 'partials/header.php';
?>

<main>
    <h1>Panier</h1>
    <div class="cart-container">
        <a href="/">&larr; Retour</a>
        <div class="cart-items">
            <?php foreach ($testData as $key => $item) { ?>
                <div class="cart-item">
                    <div class="badge"><?= $item['qty'] ?></div>
                    <img src="<?= $item['img'] ?>" alt="Fishing Rod">
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
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="cart-summary">
            <p>⚖️ 111 lbs</p>
            <p>💰 105</p>
            <button class="buy-button">Acheter</button>
        </div>
    </div>
</main>


<?php require 'partials/footer.php'; ?>