<?php

function userCreate(PDO $pdo, array $data)
{
    try {
        $stm = $pdo->prepare('INSERT INTO Joueurs (alias, nom, prenom, mot_de_passe, est_admin) 
                                    VALUES (:alias, :nom, :prenom, :mot_de_passe, :est_admin)');

        $stm->bindParam(':alias', $data['alias'], PDO::PARAM_STR);
        $stm->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
        $stm->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stm->bindParam(':mot_de_passe', $data['password'], PDO::PARAM_STR); // Correction ici
        $stm->bindValue(':est_admin', 0, PDO::PARAM_INT);
        return $stm->execute();

    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}
