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
    