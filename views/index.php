<?php
    require 'partials/header.php';
?>
<main>
<form method="post">

    <div class="filter">
            <form method="post">
                <?php foreach ($Filters as $key => $Filter) { ?>
                    <div class="filterField">
                        <input class="filterInput" type="checkbox" name="Filters[]" id="<?=$Filter['name']?>" value="<?=$Filter['name']?>" <?= $Filter['status'] ?>>
                        <label for="<?=$Filter['name']?>"><?=$Filter['name']?></label>
                    </div>
                <?php } ?>
                <div class="filterButtonField">
                    <input type="submit" class="filterButton" value="Filtrer">
                </div>
            </form>
        </div>

    <div class="grid">
        <?php foreach ($Items as $key => $Item) { ?>
            <?php if(empty($_POST) || in_array($Item['type'], $_POST['Filters']) != null) { ?>
                <a href="/details" class="item">
                    <div class="badge"><?= $Item['quantite'] ?></div>
                    <img src="<?= $Item['photo'] ?>" alt="Fishing Rod" class="itemImg">
                    <div>
                        <div class="title">
                            <span><?= $Item['nom'] ?></span>
                        </div>
                        <div>
                            <img class="symbol" src="/public/img/weight">
                            <span class="value"><?= $Item['poids'] ?> lbs</span>
                        </div>
                        <div>
                            <img class="symbol" src="/public/img/gold">
                            <span class="value"><?= $Item['prix'] ?> gold</span>
                        </div>
                        <span class="type"><?= $Item['type'] ?></span>
                    </div>
                </a>
                <?php } ?>
        <?php } ?>
    </div>



</main>

<?php require 'partials/footer.php'; ?>