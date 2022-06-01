<?php

require 'conn.php';

class DB_Model
{

    private static string $line;

    private static string $SQL;
    private static DatabaseHelper $dbHelper;
    private static PDOStatement $stmt;

public function __construct()
{
    self::$dbHelper = new DatabaseHelper;
    self::$dbHelper::init();

    self::Create(self::$dbHelper::$conn);
}

public static function Create($conn):bool
{
    if ($conn)
    {
        self::$line = file_get_contents("ice_task.sql");
        try
        {
            if (isset(self::$line))
            {
                self::$SQL = self::$line;
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->execute();

                return true;
            }
        }catch (Exception $ex)
        {
            return false;
        }
    }

    return false;
}

}

$db = new DB_Model();