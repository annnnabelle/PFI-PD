<?php

require "src/database.php";
require "models/enigme.php";

session_start();

if (isset($_POST['difficulte'])) {
    $difficulter = $_POST['difficulte'];
    $_SESSION['current_difficulte'] = $difficulter;

    if ($difficulter === 'F') {
        header("Location: /enigme-questions?F=true");
    } elseif ($difficulter === 'M') {
        header("Location: /enigme-questions?M=true");
    } elseif ($difficulter === 'D') {
        header("Location: /enigme-questions?D=true");
    }
    exit();
}

require "views/enigme-difficulter.php";