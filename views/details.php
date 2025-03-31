<?php
    require 'partials/header.php';


?>

<main class="detail-main">

    <div class="detail">
        <a href="/">
            <button class="return-button">&larr; Retour</button>
        </a>
        <div class="detail-imageFrame">
            <img src="<?=$item['photo']?>" alt="Fishing Rod" class="detail-img">
        </div>
        <div class="detail-body">
            <div class="detail-section">
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
            <div class="detail-section">
                <?php foreach ($details as $key => $detail) { ?>
                    <div>
                        <span><b><?=str_replace("_", " ", $key)?>:</b> <?=$detail?></span>
                    </div>
                <?php } ?>
                <div>
                    <span><b>Description:</b> <?=$item['description']?></span>
                </div>
            </div>
            <?php if (!empty($_SESSION['user'])) { ?>
                <form method="GET" class="addToCart">
                    <div>
                        <div class="cart-header">
                            <img src="public/img/Cart.png" class="cart-icon">
                            <div class="cart-info">
                                <div class="qty-row">
                                    <span>Quantité: </span>
                                    <select name="qty" id="quantity" onchange="updateTotalPrice()">
                                        <?php for ($i = 0; $i <= $item['quantite']; $i++) { ?>
                                            <option value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="gold-row">
                                    <span>Prix: </span>
                                    <span id="total-price"><?=$item['prix']?></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="add-button">Ajouté au panier</button>
                    </div>
                    <input type="hidden" name="quantityAdded" value="<?=$item['idItems']?>"/>
                    <input type="hidden" name="idItem" value="<?=$item['idItems']?>"/>
                </form>
            <?php }?>
    </div>
</main>

<script>
    const basePrice = <?=$item['prix']?>; // Get the item's base price
    function updateTotalPrice() {
        const quantity = document.getElementById('quantity').value;
        const totalPrice = basePrice * quantity;
        document.getElementById('total-price').textContent = totalPrice;
    }
    updateTotalPrice();
</script>

<?php require 'partials/footer.php'; ?>