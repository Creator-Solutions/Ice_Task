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

        self::BookController(self::$dbHelper::$conn);
    }

    private static function BookController($conn)
    {
        echo self::$controller::Get_Product($conn);
    }

}

$view = new BookView();