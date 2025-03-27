<?php

function itemsGetDisplay(PDO $pdo, $id)
{
    $sql = 'select idItems, nom, 
                CASE
                    WHEN type="a" then "Arme"
                    WHEN type="r" then "Armure"
                    WHEN type="n" then "Nourriture"
                    WHEN type="u" then "Munition"
                    WHEN type="m" then "Médicament"
                end
                type, prix, poids, photo, Paniers.quantite
            FROM Items
            INNER JOIN Paniers
            ON Items.idItems = Paniers.idItem
            AND idJoueur = :id;';

    $stm = $pdo->prepare($sql);
    $stm->bindParam(':id', $id, PDO::PARAM_STR);

    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function deleteItem(PDO $pdo, $idJoueur, $idItem)
{
    $sql = 'DELETE FROM Paniers WHERE idJoueur = :idJoueur AND idItem = :idItem';

    $stm = $pdo->prepare($sql);
    $stm->bindParam(':idJoueur', $idJoueur, PDO::PARAM_STR);
    $stm->bindParam(':idItem', $idItem, PDO::PARAM_STR);

    $stm->execute();
}

