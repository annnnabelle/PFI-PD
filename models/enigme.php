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

function repondreEnigme(PDO $pdo, $idJoueur, $difficulte, $estBonne )
{
    $stm = $pdo->prepare('CALL repondreEnigme(:idJoueur,:difficulte, :est_bonne)');
    $stm->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    $stm->bindParam(':difficulte', $difficulte, PDO::PARAM_STR);
    $stm->bindParam(':est_bonne', $estBonne, PDO::PARAM_STR);
   

    return $stm->execute();
}

function streakDifficulter(PDO $pdo, $joueurId)
{
    $stm = $pdo->prepare("UPDATE Joueurs SET capsules = capsules + 1000 WHERE idJoueurs = :id");
    $stm->bindParam(':id', $joueurId, PDO::PARAM_INT);
    return $stm->execute();
}

function getDifficulte(PDO $pdo, $enigmeId)
{
    $stm = $pdo->prepare("SELECT difficulte from Enigmes where idEnigmes = :enigmeId");
    $stm->bindParam(':enigmeId', $enigmeId, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
}
