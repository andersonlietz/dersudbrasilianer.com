<?php

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        self::$conn = new PDO('mysql: host=localhost; dbname=tutorialphp;','root', '');
        return self::$conn;
    }
}