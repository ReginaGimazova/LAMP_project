<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 20:16
 */

$pdoString = "pgsql:host=localhost;port=5432;dbname=LAMP_database;user=postgres;password=34Zc18WfLn";
try{
    $pdo = new PDO($pdoString);
}
catch (\PDOException $e){
    var_dump($e->getMessage());
}