<?php 
require "models/panier.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$panier = itemsGetDisplay($pdo, $_SESSION['user']['idJoueurs']);
var_dump($_SESSION['user']);


$prixtotal = 0;
foreach ($panier as $item) {
    $prixtotal += $item['prix'] * $item['quantite'];
}

$poidstotal = 0;
foreach ($panier as $item) {
    $poidstotal += $item['poids'] * $item['quantite'];
}

var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    if (isset($_POST['Supprimer']) && isset($_POST['item_id'])) {
        deleteItem($pdo, $_POST['item_id']);
    }
    if(isset($_POST['Acheter'])) {
        $info = [
            'message' => 'Voulez vous vraiment acheter ces objets ?',
            'from' => '/panier',
            'confirm' => True,
            'return' => 'confirmBuy'
        ];
        $_SESSION['info'] = $info;
        redirect('/confirm');
    }
}


if (isset($_SESSION['confirmBuy'])) {
    $totalWeight = poidsSacADos($pdo) + poidsPanier($pdo);
    $maxWeight = $_SESSION['user']['poids_max'];
    $dexterity = $_SESSION['user']['dexterite'];

    if ($dexterity == 0 || $totalWeight > $maxWeight + $dexterity) {
        $info = [
            'message' => 'Vous n\'avez pas assez de dexteriter',
            'from' => '/panier',
            'confirm' => False
        ];
        $_SESSION['info'] = $info;
    }
    else if ($totalWeight > $maxWeight && $dexterity < 100) {
        $info = [
            'message' => 'Acceptez vous de perdre de la dexterité ?',
            'from' => '/panier',
            'confirm' => True,
            'return' => 'confirmDex'
        ];
        $_SESSION['info'] = $info;
    }
    else {
        // Proceed with the purchase
        unset($_SESSION['confirmBuy']);
        unset($_SESSION['confirmDex']);
        payerPanier($pdo);
        redirect('/panier');
    }

    redirect('/confirm');
}

require "views/panier.php";


