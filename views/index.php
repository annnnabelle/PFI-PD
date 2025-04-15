<?php
    session_start();
    require 'partials/header.php';
?>
<main>
<form method="post">

    <div class="filter">
            <form method="post">
                <?php foreach ($Filters as $key => $Filter) { ?>
                    <div class="filter-field">
                        <input class="filter-input" type="checkbox" name="Filters[]" id="<?=$Filter['name']?>" value="<?=$Filter['name']?>" <?= $Filter['status'] ?>>
                        <label for="<?=$Filter['name']?>"><?=$Filter['name']?></label>
                    </div>
                <?php } ?>
                <div class="filter-button-field">
                    <input type="submit" class="filter-button" value="Filtrer">
                </div>
            </form>
        </div>

    <div class="grid">
        <?php foreach ($Items as $key => $Item) { ?>
            <?php if(empty($_POST) || in_array($Item['type'], $_POST['Filters']) != null) { ?>
                <form action="/details" method="GET" class="item" onclick="submit()">
                    <div class="badge"><?= $Item['quantite'] ?></div>
                    <img src="<?= $Item['photo'] ?>" alt="Fishing Rod" class="item-img">
                    <div class="index_details_container">
                        <div class="item-title">
                            <span><?= $Item['nom'] ?></span>
                        </div>
                        <div>
                            <img class="item-symbol" src="/public/img/weight">
                            <span class="item-value"><?= $Item['poids'] ?> lbs</span>
                        </div>
                        <div>
                            <img class="item-symbol" src="/public/img/gold">
                            <span class="item-value"><?= $Item['prix'] ?> gold</span>
                        </div>
                        <span class="item-type"><?= $Item['type'] ?></span>
                    </div>
                    <input type="hidden" name="idItem" value="<?=$Item['idItems']?>"/>
                </form>
            <?php } ?>
        <?php } ?>
    </div>



</main>

<?php require 'partials/footer.php'; ?>