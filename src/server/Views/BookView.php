<?php

require '../conn.php';
include '../Controllers/BooksController.php';

class BookView
{

    private static DatabaseHelper $dbHelper;
    private static DB_Model $dbModel;
    private static Book_Controller $controller;

    private static $encodedData;
    private static $decodedData;

    private static array $response;

    public function __construct()
    {
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$controller = new Book_Controller;

        self::$encodedData = file_get_contents("php://input");
        self::$decodedData = json_decode(self::$encodedData, true);

        if (isset(self::$decodedData['Tag']))
        {
            self::Filter(self::$dbHelper::$conn, self::$decodedData);

        }elseif (!isset(self::$decodedData['Tag']))
        {
            self::BookController(self::$dbHelper::$conn);
        }
    }

    private static function BookController($conn)
    {
        self::$controller::Get_Product($conn);
    }

    private static function Filter($conn, $filter)
    {
        echo self::$controller::Filter_Product($conn, $filter);
    }
}

$view = new BookView();