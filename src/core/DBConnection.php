<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 04.01.19
 * Time: 15:43
 */

namespace app\core;

use PDO;

class DBConnection
{
    public static function pgsqlConnection(){
        $pdoString = "pgsql:host=localhost;port=5432;dbname=LAMP_database;user=postgres;password=34Zc18WfLn";
        try{
            $pdo = new PDO($pdoString);
        }
        catch (\PDOException $e) {
            print_r("Error from database connection". $e->getMessage());
        }
        return $pdo;
    }

}