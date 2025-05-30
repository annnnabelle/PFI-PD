<?php 

require "models/panier.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$panier = itemsGetDisplay($pdo, $_SESSION['user']['idJoueurs']);
$user = $_SESSION['user'];


$prixtotal = 0;
foreach ($panier as $item) {
    $prixtotal += $item['prix'] * $item['quantite'];
}

$poidstotal = 0;
foreach ($panier as $item) {
    $poidstotal += $item['poids'] * $item['quantite'];
}



if (isset($_POST['Supprimer']) && isset($_POST['item_id'])) {
    $_SESSION['itemToDelete'] = $_POST['item_id'];
    $info = [
        'message' => 'Voulez vous vraiment supprimer cet objet ?',
        'from' => '/panier',
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
    redirect('/panier');
}


if(isset($_POST['Vider'])) {
    $info = [
        'message' => 'Voulez vous vraiment vider le panier ?',
        'from' => '/panier',
        'confirm' => True,
        'return' => 'confirmVider'
    ];
    $_SESSION['info'] = $info;
    redirect('/confirm');
}
if (isset($_SESSION['confirmVider'])) {
    unset($_SESSION['confirmVider']);
    viderPanier($pdo);
    redirect('/panier');
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

if (isset($_SESSION['confirmBuy'])) {

    $totalWeight = $poidsTotal + poidsPanier($pdo);

    if ($user['capsules'] < $prixtotal) {
        unset($_SESSION['confirmBuy']);
        $info = [
            'message' => 'Vous n\'avez pas assez d\'or.',
            'from' => '/panier',
            'confirm' => False,
        ];
        $_SESSION['info'] = $info;
        redirect('/confirm');
    }
    if ($totalWeight > $user['poids_max'] + $user['dexterite']) {
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

    unset($_SESSION['confirmBuy']);
    unset($_SESSION['confirmDex']);
    payerPanier($pdo);
    redirect('/panier');
}

require "views/panier.php";


