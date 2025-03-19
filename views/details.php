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
            <div>
                <table class="addToCart">
                    <tr>
                        <td rowspan="2"><img src="/public/img/Cart"></td>
                        <td>
                            <span>Quantité:</span>
                        </td>
                        <td>
                            <select name="qty" id="quantity" onchange="updateTotalPrice()">
                                <?php for ($i = 1; $i <= $item['quantite']; $i++) { ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="detail-symbol" src="/public/img/gold">
                            <span>Prix total:</span>
                        </td>
                        <td id="totalPrice"><?=$item['prix']?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button style="width:auto;">Ajouter</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>



<?php require 'partials/footer.php'; ?>