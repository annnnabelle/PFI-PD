<?php

require "src/database.php";

$db = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$query = "UPDATE Enigmes SET estPigee = 'n'";
$db->exec($query);

session_start();
$_SESSION['enigme_termine'] = false;
$_SESSION['questions_answered'] = 0;
unset($_SESSION['current_enigme_id']);

$_SESSION['reset_clicked'] = true;

header("Location: /enigme");
exit();

?>