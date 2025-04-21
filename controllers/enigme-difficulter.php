<?php

require "src/database.php";
require "models/enigme.php";

session_start();

if (isset($_POST['difficulte'])) {
    $difficulte = $_POST['difficulte'];
    $_SESSION['current_difficulte'] = $difficulte;

    if ($difficulte === 'F') {
        header("Location: /enigme-questions?F=true");
    } elseif ($difficulte === 'M') {
        header("Location: /enigme-questions?M=true");
    } elseif ($difficulte === 'D') {
        header("Location: /enigme-questions?D=true");
    }
    exit();
}

require "views/enigme-difficulter.php";