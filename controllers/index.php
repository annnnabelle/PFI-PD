<?php

require "models/index.php";
require "src/database.php";

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
$Items = itemsGetDisplay($pdo);

$Filters = [
    ['name' => 'Armure', 'status' => isset($_POST['Filters']) && in_array('Armure', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Arme', 'status' => isset($_POST['Filters']) && in_array('Arme', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Munition', 'status' => isset($_POST['Filters']) && in_array('Munition', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Nourriture', 'status' => isset($_POST['Filters']) && in_array('Nourriture', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Médicament', 'status' => isset($_POST['Filters']) && in_array('Médicament', $_POST['Filters']) ? 'checked' : ''],
];

require "views/index.php";

