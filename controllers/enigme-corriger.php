<?php

require "src/database.php";
require "models/enigme.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$selectedAnswer = $_POST['answer'] ?? null;
$enigmeId = $_POST['enigme_id'] ?? null;
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

    $_SESSION['answer_feedback'] = $isCorrect ? 'Correct ! Bien joué, aventurier du savoir!' : 'Incorrect! Réessayer, brave adventurer';

    if (!$isCorrect && !empty($correctAnswers)) {
        foreach ($correctAnswers as $correctAnswerData) {
            if ($correctAnswerData['est_bonne'] == 'o') {
                $bonneReponse = $correctAnswerData['reponse'];
                break;
            }
        }
    }

    $_SESSION['bonne_reponse'] = $bonneReponse;

    if ($isCorrect && isset($_SESSION['user_id'])) {
        $difficulte = $enigmeDetails['difficulte'];
        $joueurId = $_SESSION['user_id'];
        repondreEnigme($pdo, 'o', $difficulte, $joueurId);
    }
}
require 'views/enigme-corriger.php';