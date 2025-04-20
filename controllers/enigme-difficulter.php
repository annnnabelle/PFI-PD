<?php

require "src/database.php";
require "models/enigme.php";

session_start();

if (isset($_POST['difficulte'])) {
    $_SESSION['current_difficulte'] = $_POST['difficulte'];
    header("Location: /enigme-questions?difficulte=" . $_POST['difficulte']);
    exit();
}

require "views/enigme-difficulter.php";