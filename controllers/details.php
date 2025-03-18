<?php

require "src/database.php";
require "models/details.php";

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);



if(isset($_GET['idItem'])){
    $item = itemsGetDisplayById($pdo, $_GET['idItem']);
    $type = SelectArme($pdo, $_GET['idItem']);
}

var_dump($item);
var_dump($type);


require "views/details.php";

