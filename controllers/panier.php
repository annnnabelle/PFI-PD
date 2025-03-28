<?php 

require "models/general.php";
require "models/panier.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$user = userGetById($pdo, $_SESSION['user']['idJoueurs']);
$_SESSION['user'] = $user;

$panier = itemsGetDisplay($pdo, $_SESSION['user']['idJoueurs']);

$prixtotal = 0;
foreach ($panier as $item) {
    $prixtotal += $item['prix'] * $item['quantite'];
}

$poidstotal = 0;
foreach ($panier as $item) {
    $poidstotal += $item['poids'] * $item['quantite'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    if ($totalWeight >= poidsSacADos($pdo) + $user['dexterite']) {
        unset($_SESSION['confirmBuy']);
        $info = [
            'message' => 'Vous n\'avez pas assez de dexteriter',
            'from' => '/panier',
            'confirm' => False
        ];
        $_SESSION['info'] = $info;
        redirect('/confirm');
    }
    if (!isset($_SESSION['confirmDex']) && $totalWeight > $user['poids_max']) {
        $info = [
            'message' => 'Acceptez vous de perdre de la dexterité ?',
            'from' => '/panier',
            'confirm' => True,
            'return' => 'confirmDex'
        ];
        $_SESSION['info'] = $info;
        redirect('/confirm');
    }
    // Proceed with the purchase
    unset($_SESSION['confirmBuy']);
    unset($_SESSION['confirmDex']);
    payerPanier($pdo);
    redirect('/panier');
    

}

require "views/panier.php";


