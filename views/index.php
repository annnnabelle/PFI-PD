<?php
require 'partials/header.php';


?>
<main>
    <div class="filter">
        <div class="filterField">
            <input type="checkbox" name="armor">
            <label for="armor">Armure</label>
        </div>
        <div class="filterField">
            <input type="checkbox" name="weapon">
            <label for="weapon">Armes</label>
        </div>
        <div class="filterField">
            <input type="checkbox" name="ammo">
            <label for="ammo">Munitions</label>
        </div>
        <div class="filterField">
            <input type="checkbox" name="food">
            <label for="food">Nourritures</label>
        </div>
        <div class="filterField">
            <input type="checkbox" name="heal">
            <label for="heal">Médicaments</label>
        </div>
    </div>
    <div class="grid">
        <?php foreach ($testData as $key => $item) { ?>
            <a href="/" class="item">
                <div class="badge"><?= $item['qty'] ?></div>
                <img src="<?= $item['img'] ?>" alt="Fishing Rod">
                <div>
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
            </a>
        <?php } ?>
    </div>

</main>

<?php require 'partials/footer.php'; ?>