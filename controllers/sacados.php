<?php 

require "models/general.php";
require "models/sacados.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
$user = userGetById($pdo, $_SESSION['user']['idJoueurs']);
$_SESSION['user'] = $user;

$sacADos = itemsGetDisplay($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    if (isset($_POST['Supprimer']) && isset($_POST['item_id'])) {
        deleteItem($pdo, $_POST['item_id']);
        redirect('/sacados');
    }
}

require "views/sacados.php";