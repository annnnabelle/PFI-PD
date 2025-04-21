<?php

require "src/database.php";
require "models/enigme.php";


session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);


$difficulter = null;

if (isset($_GET['F'])) {
    $difficulter = 'F';
} elseif (isset($_GET['M'])) {
    $difficulter = 'M';
} elseif (isset($_GET['D'])) {
    $difficulter = 'D';
} elseif (isset($_GET['A']) || isset($_GET['aleatoire'])) {
    $difficulter = 'A';
} elseif (isset($_SESSION['current_difficulte'])) {
    $difficulter = $_SESSION['current_difficulte'];
} else {
    header("Location: /enigme-fin");
    exit();
}


if ($difficulter) {
    $_SESSION['current_difficulte'] = $difficulter;
    $questionData = getEnigme($pdo, $difficulter);

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

