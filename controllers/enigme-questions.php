<?php

require "src/database.php";
require "models/enigme.php";


session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);


$difficulte = null;

if (isset($_GET['F'])) {
    $difficulte = 'F';
} elseif (isset($_GET['M'])) {
    $difficulte = 'M';
} elseif (isset($_GET['D'])) {
    $difficulte = 'D';
} elseif (isset($_GET['A']) || isset($_GET['aleatoire'])) {
    $difficulte = 'A';
} else {
    header("Location: /enigme-fin");
    exit();
}

if ($difficulte) {
    $_SESSION['current_difficulte'] = $difficulte;
    $questionData = getEnigme($pdo, $difficulte);

    if (is_array($questionData) && count($questionData) > 0) {
        $_SESSION['current_enigme_id'] = $questionData[0]['idEnigme'];
        $question = $questionData[0]['question'];
        $answers = getReponse($pdo, $_SESSION['current_enigme_id']);
    } else {
        header("Location: /enigme-fin");
        exit();
    }
}

require "views/enigme-questions.php";

