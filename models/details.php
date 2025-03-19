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
    $type = itemsGetTypeById($pdo, $id)['type'];
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
    $sql = "select efficacite, genre, description
            FROM Armes
            WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectArmures(PDO $pdo, $id)
{
    $sql = "select matiere, taille, description
            FROM Armures
            WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectNourritures(PDO $pdo, $id)
{
    $sql = "select ptsVie, composant_nutritif, apport_calorique, mineral, description
            FROM Nourritures
            WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectMunitions(PDO $pdo, $id)
{
    $sql = "select type_arme, calibre, description
            FROM Munitions
            WHERE idItems = '$id'";

    $stm = $pdo->prepare($sql);

    $stm->execute();
        
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function SelectMedicaments(PDO $pdo, $id)
{
    $sql = "select effet_attendu, effet_indesirable, duree, description
            FROM Medicaments
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