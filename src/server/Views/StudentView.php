<?php

require '../conn.php';
require '../Controllers/StudentController.php';

class StudentView
{

    //Class attributes
    private static DatabaseHelper $dbhelper;
    private static StudentController $controller;

    private static $encodedData;
    private static $decodedData;

    /**
     * Class Constructor => Initialize objects
     *
     *
     */
    public function __construct()
    {
        self::$dbhelper = new DatabaseHelper;
        self::$dbhelper::init();

        self::$controller = new StudentController;

        self::$encodedData = file_get_contents("php://input");
        self::$decodedData = json_decode(self::$encodedData, true);

        //Conditional Function Call
        if (self::$decodedData['Type'] == 'Get')
        {
            self::Get_Students(self::$dbhelper::$conn);

        }elseif (self::$decodedData['Type'] == 'Books')
        {
            self::Get_Books(self::$dbhelper::$conn);

        }elseif (self::$decodedData['Type'] == 'Verify')
        {
            self::Verify(self::$dbhelper::$conn, self::$decodedData);

        }elseif (self::$decodedData['Type'] == 'Delete')
        {
            self::Remove_User(self::$dbhelper::$conn, self::$decodedData);
        }elseif (self::$decodedData['Type'] == 'Accept')
        {
            self::Accept_Request(self::$dbhelper::$conn, self::$decodedData);
        }elseif (self::$decodedData['Type'] == 'Decline')
        {
            self::Decline_Request(self::$dbhelper::$conn, self::$decodedData);
        }
    }

    /**
     * Controller Function Calls
     *
     * @param $conn
     * @param mixed|array
     * @return void
     */

    public static function Get_Students($conn)
    {
        echo self::$controller::Get_Student($conn);
    }

    public static function Get_Books($conn)
    {
        echo self::$controller::Get_Book($conn);
    }

    public static function Verify($conn, $arr)
    {
        echo json_encode(self::$controller::Verify_User($conn, $arr));
    }

    public static function Remove_User($conn, $arr)
    {
        echo json_encode(self::$controller::Remove_User($conn, $arr));
    }

    public static function Accept_Request($conn, $arr)
    {
        echo json_encode(self::$controller::Accept_Request($conn, $arr));
    }

    public static function Decline_Request($conn, $arr)
    {
        echo json_encode(self::$controller::Remove_Request($conn, $arr));
    }
}

$student = new StudentView();
