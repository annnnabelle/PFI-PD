<?php

function getCartItemCount(PDO $pdo)
{
    $stm = $pdo->prepare('SELECT COUNT(idItem) AS item FROM Paniers WHERE idJoueur = :id');
    $stm->bindParam(':id', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['item'];
}

function poidsSacADos(PDO $pdo)
{
    if(!isset($_SESSION['user'])) {
        return 0;
    }
    $stm = $pdo->prepare('SELECT poidsSacADos(:idJoueur)');
    $stm->bindValue(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['poidsSacADos(\'' . $_SESSION['user']['idJoueurs'] . '\')'];
}

function userGetById(PDO $pdo, $id): array
{
    $stm = $pdo->prepare('SELECT * FROM Joueurs WHERE idJoueurs = :id');
    $stm->bindParam(':id', $id, PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
}