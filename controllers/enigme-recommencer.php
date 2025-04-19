<?php

require "src/database.php";
require "models/enigme.php";

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

if ($pdo) {
    if (recommencerEnigme($pdo)) {
        session_start();
        $_SESSION['enigme_termine'] = false;
        $_SESSION['questions_answered'] = 0;
        unset($_SESSION['current_enigme_id']);
        $_SESSION['reset_clicked'] = true;
        redirect("/enigme");
        exit();
    }
}