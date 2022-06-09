<?php

require '../conn.php';
require '../Controllers/CartController.php';

class CartView
{

    private static CartController $controller;
    private static DatabaseHelper $dbHelper;

    private static $encodedData;
    private static $decodedData;

    public function __construct()
    {
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$controller = new CartController;

        self::$encodedData = file_get_contents('php://input');
        self::$decodedData = json_decode(self::$encodedData, true);

        if (self::$decodedData['Type'] == 'Add')
        {
            self::Add_To_Cart(self::$decodedData);

        }elseif (self::$decodedData['Type'] == 'Load')
        {
            self::Load_Item(self::$dbHelper::$conn);
        }elseif (self::$decodedData['Type'] == 'Sub')
        {
            self::Return_Sub(self::$dbHelper::$conn);
        }elseif (self::$decodedData['Type'] == 'Remove')
        {
            self::Remove_Item(self::$decodedData);
        }elseif (self::$decodedData['Type'] == 'Order')
        {
            self::_Order_Item(self::$dbHelper::$conn, self::$decodedData);
        }
    }

    public static function Add_To_Cart($arr)
    {
       echo json_encode(self::$controller::Add_To_Cart($arr));
    }

    public static function Load_Item($conn)
    {
        self::$controller::View_Cart($conn);
    }

    public static function Return_Sub($conn)
    {
        echo self::$controller::Total($conn);
    }

    public static function Remove_Item($arr)
    {
        self::$controller::Remove_Item($arr);
    }

    public static function _Order_Item($conn, $arr)
    {
       if (self::$controller::Order_Item($conn, $arr))
       {
           $_SESSION['Cart'] = array();
           echo "true";
       }
    }

}

$view = new CartView();
