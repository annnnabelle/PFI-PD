<?php

function calculerPrixTotal($panier) {
    $total = 0;
    foreach ($panier as $item) {
        $total += $item['price'] * $item['qty'];
    }
    return $total;
}

function calculerPoidsTotal($panier) {
    $total = 0;
    foreach ($panier as $item) {
        $total += $item['weight'] * $item['qty'];
    }
    return $total;
}

function totalPanier($panier) {
    return count($panier);
}
