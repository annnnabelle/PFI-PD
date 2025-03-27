<?php 
require "models/panier.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$panier = itemsGetDisplay($pdo, $_SESSION['user']['idJoueurs']);
var_dump($_POST);
$prixtotal = 0;
foreach ($panier as $item) {
    $prixtotal += $item['prix'] * $item['quantite'];
}

$poidstotal = 0;
foreach ($panier as $item) {
    $poidstotal += $item['poids'] * $item['quantite'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    if (isset($_POST['Supprimer']) && isset($_POST['item_id'])) {
        deleteItem($pdo, $_POST['item_id']);

    }
    if(isset($_POST['Acheter'])) {
        print("test");
        payerPanier($pdo);
    }
}

require "views/panier.php";
