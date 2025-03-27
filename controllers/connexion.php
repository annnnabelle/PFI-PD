<?php
require "models/connexion.php";
require "src/database.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION['user'])) {
    header('Location: /');
    exit;
}

$errors = [];

$alias = $_POST['alias'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($alias)) {
        $errors['alias'] = '*L\'alias est obligatoire';
    }

    if (empty($password)) {
        $errors['password'] = '*Le mot de passe est obligatoire';
    }

    if (empty($errors)) {
        $pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
        $user = userGetByAlias($pdo, $alias);


        if ($user && $password === $user['mot_de_passe']) {
            $_SESSION['user'] = $user;
            redirect('/');
        } else {
            $errors['global'] = '*Identifiants incorrects';
        }
    }
}

require "views/connexion.php";
