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
            <div>nom: <?=$item['nom']?></div>
            <div>Type: <?=$item['type']?></div>
            <div>
                <img class="detail-symbol" src="/public/img/weight">
                <span><?=$item['poids']?> lbs</span>
            </div>
            <div>
                <img class="detail-symbol" src="/public/img/gold">
                <span><?=$item['prix']?> gold</span>
            </div>
            <div>
                <span class="title">Description:</span><br>
                <span class="detail-description">ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</span>
            </div>
        </div>
    </div>
</main>

<?php require 'partials/footer.php'; ?>