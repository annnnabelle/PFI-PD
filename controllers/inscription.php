<?php
require 'src/database.php';
require 'models/inscription.php';

session_start(); // Démarrer la session

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$data = [
    'alias' => '',
    'prenom' => '',
    'nom' => '',
    'password' => '',
];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'alias' => $_POST['alias'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'nom' => $_POST['nom'] ?? '',
        'password' => $_POST['password'] ?? '',
        'vie' => 100,
        'faim' => 50,
    ];


    if (empty($data['alias'])) {
        $errors['alias'] = '*L\'alias est obligatoire<br>';
    }

    if (empty($data['prenom'])) {
        $errors['prenom'] = '*Le prénom est obligatoire<br>';
    }

    if (empty($data['nom'])) {
        $errors['nom'] = '*Le nom est obligatoire<br>';
    }

    if (empty($data['password'])) {
        $errors['password'] = '*Le mot de passe est obligatoire<br>';
    }

    if (empty($errors)) {
            $existingUser = userGetByAlias($pdo, $data['alias']);
            if ($existingUser != null) {
                $errors['alias'] = '*Cet alias est déjà utilisé. <br> Veuillez en choisir un autre.<br>';
            } else {
                $user = userCreate($pdo, $data);

                if ($user) {
                    redirect('/connexion');
                    exit;
                } else {
                    $errors['global'] = '*Une erreur est survenue lors de la création du compte.';
                }
            }
    }
}

require "views/inscription.php";