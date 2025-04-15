<?php

require "src/database.php";
require "models/enigme.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$selectedAnswer = $_GET['answer'] ?? null;
$enigmeId = $_GET['enigme_id'] ?? null;
$bonneReponse = '';

if ($selectedAnswer !== null && $enigmeId !== null) {
    $correctAnswers = getReponse($pdo, $enigmeId);
    $isCorrect = false;

    foreach ($correctAnswers as $correctAnswerData) {
        if ($selectedAnswer === $correctAnswerData['reponse'] && $correctAnswerData['est_bonne'] == 'o') {
            $isCorrect = true;
            break;
        }
    }

    $_SESSION['answer_feedback'] = $isCorrect ? 'Correct!' : 'Incorrect!';
    
    if (!$isCorrect && !empty($correctAnswers)) {
        foreach ($correctAnswers as $correctAnswerData) {
            if ($correctAnswerData['est_bonne'] == 'o') {
                $bonneReponse = $correctAnswerData['reponse'];
                break;
            }
        }
    }

    $_SESSION['bonne_reponse'] = $bonneReponse;

} else {
    $_SESSION['answer_feedback'] = 'Erreur: Données de réponse manquantes.';
    $_SESSION['bonne_reponse'] = '';
}

require 'views/enigme-corriger.php';

?>