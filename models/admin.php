<?php

function usersGetAll(PDO $pdo): array|false
{
    try {
        $query = "SELECT  Joueurs.idJoueurs, Joueurs.alias, Joueurs.nom, Joueurs.prenom,Joueurs.capsules, Joueurs.caps_augmenter FROM Joueurs";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

function augmenterCapsules(PDO $pdo, $id): bool
{
    try {
        $stm = $pdo->prepare('CALL augmenterCapsules(:idJoueur);');
    $stm->bindParam(':idJoueur',$id, PDO::PARAM_STR);
    return $stm->execute();
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}





