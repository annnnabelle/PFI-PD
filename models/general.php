<?php

function userGetById(PDO $pdo, $id): array
{
    $stm = $pdo->prepare('SELECT * FROM Joueurs WHERE idJoueurs = :id');
    $stm->bindParam(':id', $id, PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
}