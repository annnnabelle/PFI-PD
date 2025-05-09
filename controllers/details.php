<?php

require "src/database.php";
require "models/details.php";

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$allComments = getAllComments($pdo, $_GET['idItem']);

if (isset($_GET['idItem'])) {
    $item = itemsGetDisplayById($pdo, $_GET['idItem']);
    $details = itemsGetTypeDisplayById($pdo, $_GET['idItem']);
    if (isset($_GET['qty']) && $_GET['qty'] > 0) {
        addToCart($pdo, $item['idItems'], $_GET['qty']);
        $info = [
            'message' => 'Ces items ont été ajoutés au panier.',
            'from' => '/',
            'confirm' => False,
        ];
        $_SESSION['info'] = $info;
        redirect('/confirm');
    }

    $evalStars = [
        '0' => getEvalStar($pdo, $_GET['idItem'], 0),
        '1' => getEvalStar($pdo, $_GET['idItem'], 1),
        '2' => getEvalStar($pdo, $_GET['idItem'], 2),
        '3' => getEvalStar($pdo, $_GET['idItem'], 3),
        '4' => getEvalStar($pdo, $_GET['idItem'], 4),
        '5' => getEvalStar($pdo, $_GET['idItem'], 5),
    ];



    if (isset($_GET['addComment'])) {

        if(userHaveItem($pdo, $_GET['idItem'])) {
            addComment($pdo, $_GET['idItem'], $_GET['commentaire'], $_GET['note'] );
            $info = [
                'message' => 'Le commentaire a été publée',
                'from' => '/details?idItem='.$_GET['idItem'],
                'confirm' => False,
            ];
            $_SESSION['info'] = $info;
            redirect('/confirm');
        } else {
            $info = [
                'message' => 'Vous devez posséder cet item pour pouvoir laisser un commentaire',
                'from' => '/details?idItem='.$_GET['idItem'],
                'confirm' => False,
            ];
            $_SESSION['info'] = $info;
            redirect('/confirm');
        }
    }

}



require "views/details.php";
