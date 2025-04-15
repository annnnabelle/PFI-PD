<?php

require "models/enigme.php";

require "src/database.php";
session_start();

$_SESSION['enigme_termine'] = true;

require "views/enigme-fin.php";