<?php

function getEnigme(PDO $pdo, $difficulter)
{
    $stm = $pdo->prepare('CALL getEnigme(:difficulte);');
    $stm->bindParam(':difficulte', $difficulter, PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function getReponse(PDO $pdo, $idEnigme)
{
    $stm = $pdo->prepare('CALL getReponses(:idEnigme);');
    $stm->bindParam(':idEnigme', $idEnigme, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function recommencerEnigme(PDO $pdo)
{
    $stm = $pdo->prepare('CALL recommencerEnigmes();');
    return $stm->execute();
}

function repondreEnigme(PDO $pdo, $estBonne, $difficulte, $idJoueur)
{
    $stm = $pdo->prepare('CALL repondreEnigme(:est_bonne, :difficulte, :idJoueur)');
    $stm->bindParam(':est_bonne', $estBonne, PDO::PARAM_STR);
    $stm->bindParam(':difficulte', $difficulte, PDO::PARAM_STR);
    $stm->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);

    return $stm->execute();
}

function getEnigmeDetails(PDO $pdo, $enigmeId)
{
    $stm = $pdo->prepare('SELECT difficulte FROM Enigmes WHERE idEnigme = :idEnigme;');
    $stm->bindParam(':idEnigme', $enigmeId, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
}
