<?php

include "controllers/general.php";


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knapsack</title>
    <link href="/public/css/styles.css" rel="stylesheet">
</head>

<body>

    <header class="head">
        <?php if (isset($_SESSION['user'])): ?>
            <div class="profile-container">
                <div class="user-section">
                    <img class="user" src="public/img/Personnage.png" alt="Profile">
                    <p class="username"><?= htmlspecialchars($_SESSION['user']['alias']) ?></p>
                </div>
                <div class="stats">
                    <div>
                        <img src="public/img/heart.jpg" class="img-profile">
                        <span><?= $_SESSION['user']['vie'] ?></span>
                    </div>
                    <div>
                        <img src="public/img/energy.png" class="img-profile">
                        <span><?= $_SESSION['user']['dexterite'] ?></span>
                    </div>
                    <div>
                        <img src="public/img/gold.png" class="img-profile">
                        <span><?= $_SESSION['user']['capsules'] ?></span>
                    </div>
                    <div>
                        <img src="public/img/weight" class="img-profile">
                        <span> <?= $poidsTotalSacADos ?>/<?= $_SESSION['user']['poids_max'] ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <a class="clickTitle" href="/">
            <h2>Knapsack</h2>
        </a>

        <div class="links">
            <?php if (isset($_SESSION['user'])): ?>
                <?php if ($_SESSION['user']['est_admin'] == 1): ?>
                    <a href="/admin">Admin</a>
                <?php endif; ?>
                <a href="/">Mon Profile</a>
                <a href="/deconnexion">Déconnexion</a>
            <?php else: ?>
                <a href="/inscription">Inscription</a>
                <a href="/connexion">Connexion</a>
            <?php endif; ?>
        </div>
    </header>
    <?php if (isset($_SESSION['user'])): ?>
        <nav class="navbar">
            <a href="/enigme">Enigme</a>
            <a href="/sacados">Sac a dos</a>
            <a href="/panier">Panier (<?= getCartItemCount($pdo) ?>)</a>
        </nav>
    <?php endif; ?>