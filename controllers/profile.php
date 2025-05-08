<?php

require_once "models/profile.php";
require_once "src/database.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alias = $_SESSION['user']['alias'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mot_de_passe = !empty($_POST['mot_de_passe']) 
        ? password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT) 
        : null;

    $success = ModifierProfile($pdo, $alias, $nom, $prenom, $mot_de_passe);

    if ($success) {
        $_SESSION['user']['nom'] = $nom;
        $_SESSION['user']['prenom'] = $prenom;
    }

    header("Location: /profile");
    exit;
}

$user = $_SESSION['user'];

require "views/profile.php";
