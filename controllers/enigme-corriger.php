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
$diff = getDifficulte($pdo, $enigmeId);

foreach ($correctAnswers as $correctAnswerData) {
    if ($correctAnswerData['est_bonne'] === 'o') {
        $correctAnswer = $correctAnswerData['reponse'];
        break;
    }
}

if ($selectedAnswer !== null && $correctAnswer !== null) {
    $isCorrect = ($selectedAnswer === $correctAnswer);
}

if (isset($_SESSION['user']['idJoueurs']) && isset($_SESSION['current_difficulte'])) {
    $joueurId = $_SESSION['user']['idJoueurs'];
    
    $reponseId = $isCorrect ? 'o' : 'n'; 

    $diff = getDifficulte($pdo, $enigmeId); 
    $difficulte = $diff['difficulte'];     
    var_dump($joueurId, $difficulte, $reponseId);

repondreEnigme($pdo, $joueurId, $difficulte, $reponseId);


}

$_SESSION['answer_feedback'] = $isCorrect
    ? 'Correct ! Bien joué, aventurier du savoir !'
    : 'Incorrect ! Réessayez, brave aventurier !';

$_SESSION['bonne_reponse'] = $correctAnswer ?? '';

require "views/enigme-corriger.php";
