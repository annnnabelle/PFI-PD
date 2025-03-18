<?php

function itemsGetTypeById(PDO $pdo, $id)
{
    $sql = "select type
            FROM Items
            WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();

    return $stm->fetch(PDO::FETCH_ASSOC);
}

function itemsGetTypeDisplayById(PDO $pdo, $id)
{
    $type = itemsGetTypeById($pdo, $id);
    switch($type){
        case 'a':
            return SelectArme($pdo, $id);
        case 'r':
            return SelectArmures($pdo, $id);
        case 'n':
            return SelectNourritures($pdo, $id);
        case 'u':
            return SelectMunitions($pdo, $id);
        case 'm':
            return SelectMedicaments($pdo, $id);
        }
}



function SelectArme(PDO $pdo, $id)
{
    $sql = "select *
    FROM Armes
    WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectArmures(PDO $pdo, $id)
{
    $sql = "select *
    FROM Armures
    WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectNourritures(PDO $pdo, $id)
{
    $sql = "select *
    FROM Nourritures
    WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectMunitions(PDO $pdo, $id)
{
    $sql = "select *
    FROM Munitions
    WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectMedicaments(PDO $pdo, $id)
{
    $sql = "select *
    FROM Médicaments
    WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

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
                type, prix, poids, photo
            FROM Items
            WHERE idItems='$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}




/*
    $sql = "select idItems, nom, quantite, 
                CASE
                    WHEN type='a' then 'Arme'
                    WHEN type='r' then 'Armure'
                    WHEN type='n' then 'Nourriture'
                    WHEN type='u' then 'Munition'
                    WHEN type='m' then 'Médicament'
                end
                type, prix, poids, photo
            FROM Items;
            WHERE idItems = '$id'";

*/