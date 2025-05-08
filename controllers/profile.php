<?php

require_once "models/profile.php";
require_once "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ModifierProfile(
        $pdo,
        $_SESSION['user']['alias'],
        $_POST['nom'],
        $_POST['prenom'],
        password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT) // hashage sécurisé
    );
    header("Location: /profile");
    exit;
}

$user = $_SESSION['user'];

require "views/profile.php";
