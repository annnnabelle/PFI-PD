<?php
//permet de configurer la connexion à notre BD
function databaseGetPDO(array $dbConfig, array $dbParams)
{
  try {
      return new PDO("mysql:host=".$dbConfig["hostname"].";dbname=".$dbConfig["database"], $dbConfig["username"], $dbConfig["password"], $dbParams);
    } catch(PDOException $e) {
      throw new PDOException($e->getMessage(), $e->getCode());
    }
}