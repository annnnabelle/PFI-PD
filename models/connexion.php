<?php

function userGetByAlias(PDO $pdo, string $alias): ?array
{
    try {
        $query = "SELECT * FROM Joueurs WHERE alias = :alias";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':alias', $alias, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}
