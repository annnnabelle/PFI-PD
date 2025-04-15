<?php 

require "src/database.php";
require "models/enigme.php";


session_start();
if (!isset($_SESSION['enigme_termine'])) {
    $_SESSION['enigme_termine'] = false;
}

require "views/enigme.php";