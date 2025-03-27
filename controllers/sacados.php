<?php 

require "models/sacados.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$sacADos = itemsGetDisplay($pdo);


require "views/sacados.php";