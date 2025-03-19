<?php

require "src/database.php";
require "models/details.php";

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);



if(isset($_GET['idItem'])){
    $item = itemsGetDisplayById($pdo, $_GET['idItem']);
    $details = itemsGetTypeDisplayById($pdo, $_GET['idItem']);
}
require "views/details.php";

