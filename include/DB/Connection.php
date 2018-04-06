<?php

namespace App\DB;
use \PDO;

class Connection{

    public static function connect(){
        $connection = new \PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']};charset=utf8mb4",$_ENV['DB_USER'],$_ENV['DB_PASS']) or die('can not connect to db');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }

}