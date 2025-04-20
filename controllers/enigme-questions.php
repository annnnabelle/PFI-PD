<?php

require "src/database.php";
require "models/enigme.php";


session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);


if (isset($_POST['difficulte'])) {
    $difficulte = $_POST['difficulte'];
    $_SESSION['current_difficulte'] = $difficulte;
} elseif (isset($_GET['aleatoire'])) {
    $difficulte = 'A';
    $_SESSION['current_difficulte'] = $difficulte;
} elseif (isset($_SESSION['current_difficulte'])) {
    $difficulte = $_SESSION['current_difficulte'];
} else {
    header("Location: /enigme-fin");
    exit();
}

$questionData = getEnigme($pdo, $difficulte);

if ($questionData && !empty($questionData[0])) {
    $_SESSION['current_enigme_id'] = $questionData[0]['idEnigme'];
    $question = $questionData[0]['question'];
    $answers = getReponse($pdo, $_SESSION['current_enigme_id']);
} else {
    redirect('enigme-fin');
    exit;
}

require "views/enigme-questions.php";

?>