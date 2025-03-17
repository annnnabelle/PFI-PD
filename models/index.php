<?php

function itemsGetAll(PDO $pdo)
{
    $sql = 'select *
            FROM Items;';

    $stm = $pdo->prepare($sql);

    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
}