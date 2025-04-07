<?php
require "models/admin.php";
require "models/sacados.php";
require "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
$userConnected = userGetById($pdo, $_SESSION['user']['idJoueurs']);
$_SESSION['user'] = $userConnected;
$users = usersGetAll($pdo);

if(isset($_POST['augmenter'])) {
    if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        $userIdToIncrease = $_POST['user_id'];


        augmenterCapsules($pdo, $userIdToIncrease);
        header('Location: /admin');
        exit();
    } 
}

require "views/admin.php";