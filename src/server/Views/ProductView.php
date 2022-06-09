<?php

include '../conn.php';
include '../Controllers/ProductController.php';

class ProductView
{

    private static Product_Controller $controller;
    private static DatabaseHelper $dbHelper;

    private static $encodedData;
    private static $decodedData;

    public function __construct()
    {
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$controller = new Product_Controller();

        self::$encodedData = file_get_contents("php://input");
        self::$decodedData = json_decode(self::$encodedData, true);

        self::Get_Product(self::$dbHelper::$conn, self::$decodedData['Token']);
    }

    public static function Get_Product($conn, $token)
    {
       echo json_encode(self::$controller::Get_Product($conn, $token));
    }
}

$view = new ProductView();