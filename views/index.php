<?php
    require 'partials/header.php';

    var_dump($_POST);
?>
<main>
<form method="post">

        <div class="filter">
            <form method="post">
                <div class="filterField">
                    <input type="checkbox" name="Filters[]" id="armor" value="Armure">
                    <label for="armor">Armure</label>
                </div>
                <div class="filterField">
                    <input type="checkbox" name="Filters[]" id="weapon" value="Arme">
                    <label for="weapon">Armes</label>
                </div>
                <div class="filterField">
                    <input type="checkbox" name="Filters[]" id="ammo" value="munitions">
                    <label for="ammo">Munitions</label>
                </div>
                <div class="filterField">
                    <input type="checkbox" name="Filters[]" id="food" value="nourriture">
                    <label for="food">Nourritures</label>
                </div>
                <div class="filterField">
                    <input type="checkbox" name="Filters[]" id="heal" value="medicament">
                    <label for="heal">Médicaments</label>
                </div>
                <input type="submit" value="Filtrer">
                </form>
        </div>


    <div class="grid">
        <?php foreach ($testData as $key => $item) { ?>
            <?php if(in_array($item['type'], $_POST['Filters']) != null) { ?>
                <a href="/" class="item">
                    <div class="badge"><?= $item['qty'] ?></div>
                    <img src="<?= $item['img'] ?>" alt="Fishing Rod">
                    <div>
                        <div class="title">
                            <span><?= $item['title'] ?></span>
                        </div>
                        <div>
                            <img class="symbol" src="/public/img/weight">
                            <span class="value"><?= $item['weight'] ?> lbs</span>
                        </div>
                        <div>
                            <img class="symbol" src="/public/img/gold">
                            <span class="value"><?= $item['price'] ?> gold</span>
                        </div>
                        <span class="type"><?= $item['type'] ?></span>
                    </div>
                </a>
                <?php } ?>
        <?php } ?>
    </div>

</main>

<?php require 'partials/footer.php'; ?>