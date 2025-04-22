<?php

require "src/database.php";
require "models/enigme.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);


$selectedAnswer = $_POST['answer'] ?? null;
$enigmeId = $_POST['enigme_id'] ?? null;
$bonneReponse = '';
$correctAnswer = null;
$correctAnswers = getReponse($pdo, $enigmeId);

foreach ($correctAnswers as $correctAnswerData) {
    if ($correctAnswerData['est_bonne'] === 'o') {
        $correctAnswer = $correctAnswerData['reponse'];
    }
}

if ($selectedAnswer !== null && $correctAnswer !== null) {
    $isCorrect = ($selectedAnswer === $correctAnswer);

    if ($isCorrect) {
        if (isset($_SESSION['user']['idJoueurs']) && isset($_SESSION['current_difficulte'])) {
            $joueurId = $_SESSION['user']['idJoueurs'];
            $difficulter = $_SESSION['current_difficulte'];
            $reponseId = 'o'; // or you can use another value to mean "correct"

            var_dump($joueurId, $difficulter, $reponseId);

            repondreEnigme($pdo, $joueurId, $difficulter, $reponseId);
        }
    }
}

$_SESSION['answer_feedback'] = $isCorrect
    ? 'Correct ! Bien joué, aventurier du savoir !'
    : 'Incorrect ! Réessayez, brave aventurier !';

$_SESSION['bonne_reponse'] = $correctAnswer ?? '';

require "views/enigme-corriger.php";
