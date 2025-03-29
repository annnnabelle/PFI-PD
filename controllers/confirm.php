<?php
require "models/connexion.php";
require "src/database.php";

session_start();

$info = $_SESSION['info'];
$returnTo=$info['from'];


if(isset($_POST['back'])) {
    unset($_SESSION['info']);
    header('Location: ' . $returnTo);
    exit;
}
if($info['confirm'] && isset($_POST['confirm'])) {
    $_SESSION[$info['return']] = True;
    unset($_SESSION['info']);
    var_dump($_SESSION[$info['return']]);
    header('Location: ' . $returnTo);
    exit;
}


require "views/confirm.php";