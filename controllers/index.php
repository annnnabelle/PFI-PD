<?php

require "models/index.php";
require "src/database.php";

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$testData = [
    [
        'qty' => 20,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 20,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 20,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'coutelas dent de dragon',
        'type' => "Armure",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
    [
        'qty' => 2,
        'img' => '/public/img/FishingRod',
        'title' => 'TITRE',
        'type' => "Arme",
        'weight' => 20,
        'price' => 10
    ],
];


var_dump(itemsGetAll($pdo));


$Filters = [
    ['name' => 'Armure', 'status' => isset($_POST['Filters']) && in_array('Armure', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Arme', 'status' => isset($_POST['Filters']) && in_array('Arme', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Munitions', 'status' => isset($_POST['Filters']) && in_array('Munitions', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Nourriture', 'status' => isset($_POST['Filters']) && in_array('Nourriture', $_POST['Filters']) ? 'checked' : ''],
    ['name' => 'Médicaments', 'status' => isset($_POST['Filters']) && in_array('Médicaments', $_POST['Filters']) ? 'checked' : ''],
];

require "views/index.php";