<?php

function itemsGetDisplay(PDO $pdo)
{
    $sql = 'select idItems, nom, quantite, 
                CASE
                    WHEN type="a" then "Arme"
                    WHEN type="r" then "Armure"
                    WHEN type="n" then "Nourriture"
                    WHEN type="u" then "Munition"
                    WHEN type="m" then "Médicament"
                end
                type, prix, poids, photo
            FROM Items;';

    $stm = $pdo->prepare($sql);

    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

