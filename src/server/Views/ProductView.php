<?php

include '../conn.php';
include '../Controllers/ProductController.php';

class ProductView
{
    //Class Attributes
    private static Product_Controller $controller;
    private static DatabaseHelper $dbHelper;

    private static $encodedData;
    private static $decodedData;

    /**
     * Class Contructor => Initialize objects
     *
     *
     * @return void
     */
    public function __construct()
    {
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$controller = new Product_Controller();

        self::$encodedData = file_get_contents("php://input");
        self::$decodedData = json_decode(self::$encodedData, true);

        self::Get_Product(self::$dbHelper::$conn, self::$decodedData['Token']);
    }

    /**
     * Call Product function to get products from table
     *
     *
     * @param $conn
     * @param $token
     * @return void
     */
    public static function Get_Product($conn, $token)
    {
       echo json_encode(self::$controller::Get_Product($conn, $token));
    }
}

$view = new ProductView();
