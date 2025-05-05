<?php

function itemsGetTypeById(PDO $pdo, $id)
{
    $sql = "select type FROM Items WHERE idItems = :id";

    $stm = $pdo->prepare($sql);

    $stm->bindParam(':id', $id, PDO::PARAM_INT);

    $stm->execute();

    return $stm->fetch(PDO::FETCH_ASSOC);
}

function itemsGetTypeDisplayById(PDO $pdo, $id)
{
    $sql = "CALL getDetails(:id)";

    $stm = $pdo->prepare($sql);

    $stm->bindParam(':id', $id, PDO::PARAM_INT);

    $stm->execute();

    return $stm->fetch(PDO::FETCH_ASSOC);
}

function itemsGetDisplayById(PDO $pdo, $id)
{
    $sql= "select idItems, nom, quantite, 
                CASE
                    WHEN type='a' then 'Arme'
                    WHEN type='r' then 'Armure'
                    WHEN type='n' then 'Nourriture'
                    WHEN type='u' then 'Munition'
                    WHEN type='m' then 'Médicament'
                end
                type, prix, poids, photo, description
            FROM Items
            WHERE idItems='$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}


function addToCart(PDO $pdo, $id, $quantite)
{
    $stm = $pdo->prepare('CALL ajouterItemPanier( :idJoueur, :idItem, :quantite);');
    $stm->bindParam(':idItem', $id, PDO::PARAM_STR);
    $stm->bindParam(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->bindParam(':quantite', $quantite, PDO::PARAM_STR);
    return $stm->execute();
}


function addComment(PDO $pdo, $id, $commentaire, $note)
{
    $stm = $pdo->prepare('CALL ajouterEvaluation( :idJoueur, :idItem, :commentaire, :note);');
    $stm->bindParam(':idItem', $id, PDO::PARAM_STR);
    $stm->bindParam(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
    $stm->bindParam(':note', $note, PDO::PARAM_STR);
    return $stm->execute();
}

function userHaveItem(PDO $pdo, $id): bool
{
    $stm = $pdo->prepare('SELECT COUNT(idItem) AS item FROM SacADos WHERE idJoueur = :id AND idItem = :idItem');
    $stm->bindParam(':id', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->bindParam(':idItem', $id, PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['item'] > 0;
}

function getAllComments(PDO $pdo, $id): array|false
{
    $stm = $pdo->prepare('CALL getEvaluation(:idItem);');
    $stm->bindParam(':idItem', $id, PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}