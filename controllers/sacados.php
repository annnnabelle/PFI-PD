<?php 

require "models/sacados.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
$user = userGetById($pdo, $_SESSION['user']['idJoueurs']);
$_SESSION['user'] = $user;

$sacADos = itemsGetDisplay($pdo);
$poids_max = poidsMaxSacADos($pdo);

$poidstotal = 0;
foreach ($sacADos as $item) {
    $poidstotal += $item['poids'] * $item['quantite'];
}

if (isset($_POST['Supprimer']) && isset($_POST['item_id'])) {
    $_SESSION['itemToDelete'] = $_POST['item_id'];
    $info = [
        'message' => 'Voulez vous vraiment supprimer cet item de votre sac à dos ?',
        'from' => '/sacados',
        'confirm' => True,
        'return' => 'deleteItem'
    ];
    $_SESSION['info'] = $info;
    redirect('/confirm');
}
if(isset($_SESSION['deleteItem'])) {
    deleteItem($pdo, $_SESSION['itemToDelete']);
    unset($_SESSION['deleteItem']);
    unset($_SESSION['itemToDelete']);
    redirect('/sacados');
}

require "views/sacados.php";