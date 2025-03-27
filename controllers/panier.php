<?php 
require "models/panier.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$panier = itemsGetDisplay($pdo, $_SESSION['user']['idJoueurs']);



$prixtotal = getPrixMax($pdo) ? null : "0";


var_dump($prixtotal);

$poidstotal = getPoidMax($pdo) ? null : "0";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    if (isset($_POST['Supprimer']) && isset($_POST['item_id'])) {
        deleteItem($pdo, $_POST['item_id']);
        redirect('/panier');
    }
}

require "views/panier.php";
