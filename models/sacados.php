<?php



function itemsGetDisplay(PDO $pdo)
{
    $sql = 'select idItems, nom, 
                CASE
                    WHEN type="a" then "Arme"
                    WHEN type="r" then "Armure"
                    WHEN type="n" then "Nourriture"
                    WHEN type="u" then "Munition"
                    WHEN type="m" then "Médicament"
                end
                type, prix, poids, photo, SacADos.quantite
            FROM Items
            INNER JOIN SacADos
            ON Items.idItems = SacADos.idItem
            AND idJoueur = :id;';

    $stm = $pdo->prepare($sql);
    $stm->bindParam(':id', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);

    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
}   

function deleteItem(PDO $pdo, $idItem)
{
    $stm = $pdo->prepare('CALL supprimerSacADos(:idItem, :idJoueur);');
    $stm->bindParam(':idItem', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->bindParam(':idJoueur', $idItem, PDO::PARAM_STR);
    return $stm->execute();
}



function poidsMaxSacADos(PDO $pdo)
{
    $stm = $pdo->prepare('SELECT poids_max FROM Joueurs WHERE idJoueurs = :idJoueur');
    $stm->bindValue(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
}

function sellItem(PDO $pdo, $idItem, $quantite)
{
    $stm = $pdo->prepare('CALL sellItem(:idJoueur, :idItem, :quantite);');
    $stm->bindValue(':idItem', $idItem, PDO::PARAM_STR);
    $stm->bindValue(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->bindValue(':quantite', $quantite, PDO::PARAM_STR);
    return $stm->execute();
}


function eatItem(PDO $pdo, $idItem, $quantite, $type)
{
    $stm = $pdo->prepare('CALL eatItem(:idJoueur, :idItem, :quantite, :type);');
    $stm->bindValue(':idItem', $idItem, PDO::PARAM_STR);
    $stm->bindValue(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->bindValue(':quantite', $quantite, PDO::PARAM_STR);
    $stm->bindValue(':type', $type, PDO::PARAM_STR);
    return $stm->execute();
}

function checkRestock(PDO $pdo)
{
    $stm = $pdo->prepare('CALL checkForFood(:idJoueur);');
    $stm->bindValue(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->execute();

    $stm = $pdo->prepare('CALL checkForMedicine(:idJoueur);');
    $stm->bindValue(':idJoueur', $_SESSION['user']['idJoueurs'], PDO::PARAM_STR);
    $stm->execute();
}