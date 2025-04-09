<?php

require "models/general.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} else {

    $pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

    if (isset($_SESSION['user'])) {
        $user = userGetById($pdo, $_SESSION['user']['idJoueurs']);
        $_SESSION['user'] = $user;
    }

    $poidsTotalSacADos = poidsSacADos($pdo);
}