<?php

require '../Controllers/UploadController.php';
require '../conn.php';

class Request_View
{

    //Class Attributes
    private static DatabaseHelper $dbHelper;
    private static UploadController $controller;

    private static $encodedData;
    private static $decodedData;

    private static array $response;

    /**
     * Call Controller Function
     *
     *
     * @return void
     */
    public function __construct()
    {
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$encodedData = file_get_contents("php://input");
        self::$decodedData = json_decode(self::$encodedData, true);

        self::$controller = new UploadController;
        self::Request(self::$dbHelper::$conn, self::$decodedData);
    }

    /**
     * Call request function from Controller Class
     *
     *
     * @param $conn
     * @param $arr
     * @return void
     */
    public static function Request($conn, $arr)
    {
        self::$response[] = self::$controller::Request_Book($conn, $arr);
        echo json_encode(self::$response);
    }

}

$request = new Request_View();
