<?php 

require "models/sacados.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$sacADos = itemsGetDisplay($pdo);
$poids_max = poidsMaxSacADos($pdo);

$poidstotal = 0;
foreach ($sacADos as $item) {
    $poidstotal += $item['poids'] * $item['quantite'];
}

if (isset($_POST['sell'])) {
    $_SESSION['itemToSell'] = $_POST['itemId'];
    $_SESSION['quantityUsed'] = $_POST['quantityUsed'];
    $info = [
        'message' => 'Voulez vous vraiment vendre cet item ?',
        'from' => '/sacados',
        'confirm' => True,
        'return' => 'sellItem'
    ];
    $_SESSION['info'] = $info;
    redirect('/confirm');
}
if(isset($_SESSION['sellItem'])) {
    sellItem($pdo, $_SESSION['itemToSell'], $_SESSION['quantityUsed']);
    unset($_SESSION['sellItem']);
    unset($_SESSION['itemToSell']);
    unset($_SESSION['quantityUsed']);
    redirect('/sacados');
}



if (isset($_POST['eat'])) {
    $_SESSION['itemToEat'] = $_POST['itemId'];
    $_SESSION['quantityUsed'] = $_POST['quantityUsed'];
    $_SESSION['itemType'] = $_POST['itemType'];
    $info = [
        'message' => 'Voulez vous vraiment manger cet item ?',
        'from' => '/sacados',
        'confirm' => True,
        'return' => 'eatItem'
    ];
    $_SESSION['info'] = $info;
    redirect('/confirm');
}
if(isset($_SESSION['eatItem'])) {
    eatItem($pdo, $_SESSION['itemToEat'], $_SESSION['quantityUsed'], $_SESSION['itemType'] == 'Médicament' ? 1 : 0);
    unset($_SESSION['eatItem']);
    unset($_SESSION['itemToEat']);
    unset($_SESSION['quantityUsed']);
    unset($_SESSION['itemType']);
    redirect('/sacados');
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