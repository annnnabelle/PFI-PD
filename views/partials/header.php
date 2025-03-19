<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
    <h2>Knapsack</h2>
    <div class="links">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="/deconnexion">Déconnexion</a>
        <?php else: ?>
        <a href="/inscription">Inscription</a>
        <a href="/connexion">Connexion</a>
        <?php endif; ?>
    </div>
</header>
