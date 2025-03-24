<?php 
session_start();
require "models/panier.php";
require "src/database.php";

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$panier = $_SESSION['panier'] ?? [];

$prixtotal = calculerPrixTotal($panier);
$poidstotal = calculerPoidsTotal($panier);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Supprimer']) && isset($_POST['item_name'])) {
        foreach ($panier as $key => $item) {
            if ($item['name'] === $_POST['item_name']) {
                unset($panier[$key]);
                $_SESSION['panier'] = array_values($panier);
                break;
            }
        }
        redirect("/panier");
        exit();
    }

    if (isset($_POST['Ajouter'])) {
        unset($_SESSION['panier']);
        redirect("/");
        exit();
    }
}

require "views/panier.php";
