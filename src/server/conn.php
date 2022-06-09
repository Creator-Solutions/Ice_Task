<?php

class DatabaseHelper
{

    //Class Properties
    private static string $servername = 'localhost';
    private static string $username = 'root';
    private static string $password = '';
    private static string $dbname='ice_task';

    public static $conn;

    private static string $SQL;

    /**
     * init function => handles connecting to DB
     *
     * @return void
     */
    public static function init()
    {
        if (self::$conn == null)
        {
            try
            {
                self::$conn = new PDO("mysql:host=".self::$servername.";", self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$SQL = "CREATE DATABASE IF NOT EXISTS ".self::$dbname;
                self::$conn->exec(self::$SQL);

                self::$SQL = "USE ".self::$dbname;
                self::$conn->exec(self::$SQL);
            }catch (Exception $ex)
            {
                echo $ex;
            }
        }
    }
}
