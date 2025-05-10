<?php
require 'partials/header.php';


?>

<main>
    <div class="detail-main">
        <div class="detail">
            <a href="/">
                <button class="return-button">&larr; Retour</button>
            </a>
            <div class="detail-imageFrame">
                <img src="<?= $item['photo'] ?>" alt="Fishing Rod" class="detail-img">
            </div>
            <div class="detail-body">
                <div class="detail-section">
                    <div><b>nom:</b> <?= $item['nom'] ?></div>
                    <div><b>Type:</b> <?= $item['type'] ?></div>
                    <div class="detail-values">
                        <img class="detail-symbol" src="/public/img/weight">
                        <span><?= $item['poids'] ?> lbs</span>
                    </div>
                    <div class="detail-values">
                        <img class="detail-symbol" src="/public/img/gold">
                        <span><?= $item['prix'] ?> gold</span>
                    </div>
                </div>
                <div class="detail-section">

                    <?php foreach ($details as $key => $detail) { ?>
                        <div>
                            <span><b><?= str_replace("_", " ", $key) ?>:</b> <?= $detail ?></span>
                        </div>
                    <?php } ?>
                    <div>
                        <span><b>Description:</b> <?= $item['description'] ?></span>
                    </div>
                </div>
                <div class="interaction-row">
                    <div class="eval-stars">
                        <?php foreach (array_reverse($evalStars, true) as $star => $percentage) { ?>
                            <div><?= $star ?> stars: <?= $percentage ?>%</div>
                        <?php } ?>
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
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="gold-row">
                                            <span>Prix: </span>
                                            <span id="total-price"><?= $item['prix'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="addToCart" class="add-button">Ajouté au panier</button>
                            </div>
                            <input type="hidden" name="quantityAdded" value="<?= $item['idItems'] ?>" />
                            <input type="hidden" name="idItem" value="<?= $item['idItems'] ?>" />
                        </form>
                    <?php } ?>
                </div>
            </div>

        </div>



        <div class="comment-section">

            <h2 class="comment-section-header">Avis des utilisateurs</h2>
            <div class="comment-list">
                <?php foreach ($allComments as $key => $comment) { ?>

                    <div class="comment-container">
                        <div class="comment-header">

                            <span class="comment-user">User: <?= $comment['alias'] ?></span>

                            <div class="comment-header">
                                <span class="comment-note"><?= $comment['note'] ?></span>
                                <div class="badge"></div>
                                <form method="post">
    <input type="hidden" name="idItem" value="<?= $item['idItems'] ?>">
    <button type="submit" class="comment-garbage-btn" name="Supprimer"
        value="<?= $comment['idEvaluations'] ?>">
        <img src="/public/img/Garbage_can.png" alt="Delete">
    </button>
</form>

                            </div>
                        </div>

                        <div class="comment"><?= $comment['commentaire'] ?></div>
                        

                    </div>




                <?php } ?>
            </div>

            <?php if (!empty($_SESSION['user'])) { ?>
                <div>
                    <form method="GET" class="comment-form">
                        <div class="chicken-rating">
                            <img src="/public/img/darkChicken.png" alt="Chicken 1" data-index="1" class="chicken">
                            <img src="/public/img/darkChicken.png" alt="Chicken 2" data-index="2" class="chicken">
                            <img src="/public/img/darkChicken.png" alt="Chicken 3" data-index="3" class="chicken">
                            <img src="/public/img/darkChicken.png" alt="Chicken 4" data-index="4" class="chicken">
                            <img src="/public/img/darkChicken.png" alt="Chicken 5" data-index="5" class="chicken">
                        </div>
                        <input type="hidden" id="submit-rating" name="note" value="0">
                        <input type="hidden" name="idItem" value="<?= $item['idItems'] ?>" />
                        <input type="text" name="commentaire" placeholder="Ajouter un commentaire" class="comment-input">
                        <button type="submit" name="addComment" class="comment-send">Envoyer</button>
                    </form>

                </div>
            <?php } ?>

        </div>

    </div>


</main>


<script>
    const basePrice = <?= $item['prix'] ?>; // Get the item's base price
    function updateTotalPrice() {
        const quantity = document.getElementById('quantity').value;
        const totalPrice = basePrice * quantity;
        document.getElementById('total-price').textContent = totalPrice;
    }
    updateTotalPrice();




    //Rating system
    const chickenRating = document.querySelector('.chicken-rating');
    const chickens = document.querySelectorAll('.chicken');
    const ratingInput = document.getElementById('submit-rating');
    let selectedRating = 0;

    chickenRating.addEventListener('mouseover', (event) => {
        if (event.target.classList.contains('chicken')) {
            const hoveredIndex = parseInt(event.target.dataset.index);

            chickens.forEach((chicken, index) => {
                if (index + 1 <= hoveredIndex) {
                    chicken.classList.add('bright');
                } else if (index + 1 > selectedRating) {
                    chicken.classList.remove('bright');
                }
            });
        }
    });

    chickenRating.addEventListener('mouseleave', () => {
        chickens.forEach((chicken, index) => {
            if (index + 1 > selectedRating) {
                chicken.classList.remove('bright');
            }
        });
    });

    chickenRating.addEventListener('click', (event) => {
        if (event.target.classList.contains('chicken')) {
            selectedRating = parseInt(event.target.dataset.index);
            ratingInput.value = selectedRating;
            console.log('Selected rating:', selectedRating);

            chickens.forEach((chicken, index) => {
                if (index + 1 <= selectedRating) {
                    chicken.classList.add('bright');
                } else {
                    chicken.classList.remove('bright');
                }
            });
        }
    });

</script>

<style>
    .comment-garbage-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
 
    }
    .comment-garbage-btn img {
        width: 40px;
        height: 40px;
 
    }

    .comment-section {
        background: rgb(219, 244, 255);
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 1200px;
        white-space: normal;
        justify-items: center;
        margin: 1vh auto;
        border: 3px solid #064b9a;
        border-radius: 20px;
        justify-content: space-around;

        height: auto;

        padding: 20px;
        display: flex;
        flex-direction: column;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .comment-section-header {
        font-size: 50px;
        color: #064b9a;
        margin-bottom: 20px;
        align-self: center;
    }

    .comment-form {
        display: flex;
        align-items: center;
        margin-top: 60px;
    }

    .interaction-row {
        display: flex;
        gap: 30px;
        /* Space between stars and cart */
        align-items: flex-start;
        /* Align them from the top */
        margin-top: 20px;
        /* Optional: spacing from above content */
    }

    .eval-stars {
        min-width: 150px;
        /* Optional: prevents shrinking */
        font-size: 40px;
    }

    .comment-input {
        flex: 10;
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 5px;
    }

    .comment-send {
        flex: 1;
        padding: 10px;
        background-color: #1E90FF;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 0.8em;
        cursor: pointer;
        margin: 5px;
    }

    .comment-list {
        display: flex;
        flex-direction: column;
        height: auto;
    }

    .comment {
        font-size: 30px;
        margin-left: 30px;
        border: 1px solid #064b9a;
        border-radius: 10px;
        padding: 10px;
        background-color: white;
        overflow-wrap: break-word;
        /* Allows breaking long words to prevent overflow */
        word-break: break-word;
        /* Alternative/fallback for wider compatibility */
        white-space: normal;
        /* Ensure default wrapping behavior */
    }

    .comment-user {
        font-size: 30px;
    }

    .comment-container {
        margin: 10px 0px;
    }

    .comment-header {
        height: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .comment-note {
        font-size: 50px;
        text-shadow: 1px 1px 1px white;
        color: black;
        margin-right: 2px;
    }

    .badge {
        width: 40px;
        height: 40px;

        color: white;
        background-image: url('../public/img/lightChicken.png');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        text-shadow: 1px 1px 2px black;

    }



    .chicken-rating {
        padding: 10px;
        display: flex;
        /* To arrange chickens in a row */
    }

    .chicken {
        width: 30px;
        /* Adjust as needed */
        height: 30px;
        /* Adjust as needed */
        cursor: pointer;
        /* Indicate they are interactive */
    }

    .chicken.bright {
        /* You can change the image source or apply other styles for the bright effect */
        content: url('/public/img/lightChicken.png');
    }





    @media (max-width: 768px) {
        .comment-section {
            flex-direction: column;
            width: auto;
        }

        .comment-section-header {
            font-size: 30px;
        }

        .detail-main {
            flex-direction: column;
            align-items: center;
            width: 90%;
            margin: 5px auto
        }

        .comment-form {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>

<?php require 'partials/footer.php'; ?>