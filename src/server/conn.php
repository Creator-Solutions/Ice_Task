<?php

class DatabaseHelper
{

    private static string $servername = 'localhost';
    private static string $username = 'root';
    private static string $password = '';
    private static string $dbname='ice_task';

    public static $conn;

    private static string $SQL;

    public static function init()
    {
        if (self::$conn == null)
        {
            try
            {
                self::$conn = new PDO("mysql:host=".self::$servername.";dbname=".self::$dbname.";", self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$SQL = "CREATE DATABASE ".self::$dbname;

                self::$conn->exec(self::$SQL);
            }catch (Exception $ex)
            {
                echo $ex;
            }
        }
    }
}