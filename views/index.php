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
        <?php foreach ($testData as $key => $item) { ?>
            <?php if(empty($_POST) || in_array($item['type'], $_POST['Filters']) != null) { ?>
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