<?php

function ModifierProfile(PDO $pdo, $alias, $nom, $prenom, $mot_de_passe)
{
    try {
        if ($mot_de_passe !== null) {
            $stmt = $pdo->prepare('CALL ModifierProfile(:alias, :nom, :prenom, :mot_de_passe);');
        } else {
            $stmt = $pdo->prepare('CALL ModifierProfileSansMDP(:alias, :nom, :prenom);');
        }

        $stmt->bindParam(':alias', $alias, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);

        if ($mot_de_passe !== null) {
            $stmt->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
        }

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}
