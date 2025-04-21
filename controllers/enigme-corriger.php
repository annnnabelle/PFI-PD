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
        if (
            $selectedAnswer === $correctAnswerData['reponse'] &&
            $correctAnswerData['est_bonne'] === 'o'
        ) {
            $isCorrect = true;

            if (isset($_SESSION['user_id']) && isset($_SESSION['current_difficulte'])) {
                $joueurId = $_SESSION['user_id'];
                $difficulter = $_SESSION['current_difficulte'];
                $reponseId = $correctAnswerData['idReponse'];

                repondreEnigme($pdo, $reponseId, $difficulter, $joueurId);

                if ($_SESSION['current_difficulte'] !== $difficulter) {
                    $_SESSION['difficile_streak'] = 0;
                }

                if ($difficulter === 'D' && $isCorrect) {
                    if (!isset($_SESSION['difficile_streak'])) {
                        $_SESSION['difficile_streak'] = 1;
                    } else {
                        $_SESSION['difficile_streak']++;
                    }

                    if ($_SESSION['difficile_streak'] >= 3) {
                        streakDifficulter($pdo, $joueurId);
                        $_SESSION['answer_feedback'] .= 'BONUS : 1000 capsules pour 3 réponses difficiles consécutives !';
                        $_SESSION['difficile_streak'] = 0;
                    }
                } else {
                    $_SESSION['difficile_streak'] = 0;
                }
            }

            break;
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
