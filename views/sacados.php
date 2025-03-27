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
                <?php foreach ($sacADos as $key => $item) { ?>
                    
                    <div class="backpack-item">
                        <button class="garbage-btn">
                            <img src="/public/img/Garbage_can.png" alt="Delete">
                        </button>
                        <img class="cart-item-img" src="<?= $item['img'] ?>" alt="Fishing Rod">
                        <div class="item-details">
                            <div><?= $item['title'] ?></div>
                            <div class="detail-values">
                    <img class="detail-symbol" src="/public/img/weight">
                    <span><?=$item['weight']?> lbs</span>
                </div>
                <div class="detail-values">
                    <img class="detail-symbol" src="/public/img/gold">
                    <span><?=$item['price']?> gold</span>
                </div>
                            <span class="type"><?= $item['type'] ?></span>
                            <div>Qte: <?= $item['qty'] ?></div>
                            
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
            </div>

        </div>
    </div>
</main>

<script>
    const basePrice = <?=$item['prix']?>; // Get the item's base price
    
    function updateTotalPrice() {
        const quantity = document.getElementById('quantity').value;
        const totalPrice = basePrice * quantity;
        document.getElementById('total-price').textContent = totalPrice;
    }

    // Initialize the price when the page loads
    updateTotalPrice();
</script>



<?php require 'partials/footer.php'; ?>
