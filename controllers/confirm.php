<?php
require "models/connexion.php";
require "src/database.php";

session_start();

if(!isset($_SESSION['info'])) {
    header('Location:' . $_SESSION['returnTo']);
    exit;
}

$info = $_SESSION['info'];
$returnTo=$info['from'];


if(isset($_POST['back'])) {
    $_SESSION['returnTo'] = $_SESSION['info']['from'];
    unset($_SESSION['info']);
    header('Location: ' . $returnTo);
    exit;
}
if($info['confirm'] && isset($_POST['confirm'])) {
    $_SESSION['returnTo'] = $_SESSION['info']['from'];
    $_SESSION[$info['return']] = True;
    unset($_SESSION['info']);
    header('Location: ' . $returnTo);
    exit;
}

require "views/confirm.php";