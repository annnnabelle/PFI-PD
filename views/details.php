<?php
    require 'partials/header.php';
?>


<main class="detail-main">
    <a href="/">
            <button class="return-button">Retour</button>
        </a>
    <div class="detail">

        <img src="<?=$item['photo']?>" alt="Fishing Rod" class="detail-img">
        <div class="detail-body">
            <div><b>nom:</b> <?=$item['nom']?></div>
            <div><b>Type:</b> <?=$item['type']?></div>
            <div>
                <img class="detail-symbol" src="/public/img/weight">
                <span><?=$item['poids']?> lbs</span>
            </div>
            <div>
                <img class="detail-symbol" src="/public/img/gold">
                <span><?=$item['prix']?> gold</span>
            </div><br>
            <?php foreach ($details as $key => $detail) { ?>
                <div>
                
                    <span><b><?=str_replace("_", " ", $key)?>:</b> <?=$detail?></span>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>