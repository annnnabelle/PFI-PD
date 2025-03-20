<?php
    require 'partials/header.php';

    $prix = 0;
?>

<main class="detail-main">

    <div class="detail">
        <a href="/">
            <button class="return-button">Retour</button>
        </a>
        <img src="<?=$item['photo']?>" alt="Fishing Rod" class="detail-img">
        <div class="detail-body">
            <div>
                <div><b>nom:</b> <?=$item['nom']?></div>
                <div><b>Type:</b> <?=$item['type']?></div>
                <div class="detail-values">
                    <img class="detail-symbol" src="/public/img/weight">
                    <span><?=$item['poids']?> lbs</span>
                </div>
                <div class="detail-values">
                    <img class="detail-symbol" src="/public/img/gold">
                    <span><?=$item['prix']?> gold</span>
                </div>
            </div>
            <div>
                <?php foreach ($details as $key => $detail) { ?>
                    <div>
                        <span><b><?=str_replace("_", " ", $key)?>:</b> <?=$detail?></span>
                    </div>
                <?php } ?>
                <div>
                    <span><b>Description:</b> <?=$item['description']?></span>
                </div>
            </div>

            <div class="addToCart">
                <div>
                    <div class="cart-header">
                        <img src="public/img/Cart.png" class="cart-icon">
                        <div class="cart-info">
                            <div class="qty-row">
                                <span>Quantité: </span>
                                <select name="qty" id="quantity" onchange="updateTotalPrice()">
                                    <?php for ($i = 1; $i <= $item['quantite']; $i++) { ?>
                                        <option value="<?=$i?>"><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="gold-row">
                                <span>Prix: </span>
                                <span>10</span>
                            </div>
                        </div>
                    </div>
                    <button class="add-button">Ajouté au paniers</button>
                </div>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>