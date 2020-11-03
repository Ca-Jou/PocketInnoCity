<?php
namespace Framework;

class PDOFactory
{
    public static function getMySQLConnexion()
    {
        $db = new \PDO('mysql:host=localhost;dbname=PIC', 'XXXXX', 'XXXXX');     // Replace username and password
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}

