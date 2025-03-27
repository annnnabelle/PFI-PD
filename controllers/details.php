<?php

require "src/database.php";
require "models/details.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

if(isset($_GET['idItem'])){
    $item = itemsGetDisplayById($pdo, $_GET['idItem']);
    $details = itemsGetTypeDisplayById($pdo, $_GET['idItem']);
    if(isset($_GET['qty']) && $_GET['qty'] > 0){
        addToCart($pdo, $item['idItems'],$_GET['qty']);
        $item = itemsGetDisplayById($pdo, $_GET['idItem']);
    }
}

require "views/details.php";

