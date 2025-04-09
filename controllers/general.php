<?php

require "models/general.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} else {

    $pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

    $poidsTotalSacADos = poidsSacADos($pdo);

    $user = userGetById($pdo, $_SESSION['user']['idJoueurs']);
    $_SESSION['user'] = $user;
}