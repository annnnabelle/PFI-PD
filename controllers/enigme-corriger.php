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
        if ($correctAnswerData['est_bonne'] === 'o') {
            $isCorrect = true;
            
            if (isset($_SESSION['user']['idJoueurs']) && isset($_SESSION['current_difficulte'])) {
                $joueurId = $_SESSION['user']['idJoueurs'];
                $difficulter = $_SESSION['current_difficulte'];
                $reponseId = $correctAnswerData['est_bonne'];

                var_dump($joueurId, $difficulter, $reponseId);

                repondreEnigme($pdo, $joueurId, $difficulter, $reponseId);

            }
            
        }
     
    }

    $_SESSION['answer_feedback'] = $isCorrect
        ? 'Correct ! Bien joué, aventurier du savoir !'
        : 'Incorrect ! Réessayez, brave aventurier !';

    if (!$isCorrect && !empty($correctAnswers)) {
        foreach ($correctAnswers as $correctAnswerData) {
            if ($correctAnswerData['est_bonne'] === 'o') {
                $bonneReponse = $correctAnswerData['reponse'];
                break;
            }
        }
    }

    $_SESSION['bonne_reponse'] = $bonneReponse;
}

require 'views/enigme-corriger.php';
