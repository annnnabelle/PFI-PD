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

function deleteItem(PDO $pdo, $idItem)
{
    $stm = $pdo->prepare('CALL supprimerPanier(:idItem, :idJoueur);');
    $stm->bindParam(':idItem', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->bindParam(':idJoueur', $idItem, PDO::PARAM_STR);
    return $stm->execute();
}

function payerPanier(PDO $pdo)
{
    $stm = $pdo->prepare('CALL payerPanier(:idJoueur);');
    $stm->bindParam(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->execute();
}
