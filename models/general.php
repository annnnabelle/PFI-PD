<?php

function getCartItemCount(PDO $pdo)
{
    $stm = $pdo->prepare('SELECT COUNT(idItem) AS item FROM Paniers WHERE idJoueur = :id');
    $stm->bindParam(':id', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['item'];
}