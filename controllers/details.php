<?php

require "src/database.php";

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);


require "views/details.php";

