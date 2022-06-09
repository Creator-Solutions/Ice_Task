<?php

require '../conn.php';
include '../Controllers/BooksController.php';

class BookView
{

    //Class Attributes
    private static DatabaseHelper $dbHelper;
    private static DB_Model $dbModel;
    private static Book_Controller $controller;

    private static $encodedData;
    private static $decodedData;

    private static array $response;

    /**
     * Class Constructor => Initialize class attributes
     *
     *
     */
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

    /**
     * Call Controller Function
     *
     *
     * @param $conn
     * @return void
     */
    private static function BookController($conn)
    {
        self::$controller::Get_Product($conn);
    }

    /**
     * Call Filter Function From Controller Class
     *
     *
     * @param $conn
     * @return void
     */
    private static function Filter($conn, $filter)
    {
        echo self::$controller::Filter_Product($conn, $filter);
    }
}

$view = new BookView();
