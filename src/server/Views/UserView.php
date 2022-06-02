<?php

require '../conn.php';
include '../Controllers/UserController.php';
include '../Models/User.php';

class UserView
{

    private static DatabaseHelper $dbHelper;
    private static DB_Model $dbModel;
    private static User_Controller $controller;
    private static User $user;

    private static $encodedData;
    private static $decodedData;

    private static array $response;

    public function __construct()
    {
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$controller = new User_Controller;

        self::UserController(self::$dbHelper::$conn);
    }

    public static function UserController($conn)
    {
        self::$encodedData = file_get_contents("php://input");
        self::$decodedData = json_decode(self::$encodedData, true);

        if (self::$decodedData['Type'] == 'Login')
        {
            //Call authentication func
            self::$response = self::$controller::Authenticate($conn, self::$decodedData);

        }elseif (self::$decodedData['Type'] == 'Register')
        {

            //Initialize a new user
            $user = new User(
                self::$decodedData['UUID'],
                self::$decodedData['FullName'],
                self::$decodedData['Email'],
                password_hash(self::$decodedData['Password'], PASSWORD_ARGON2ID)
            );

            //Store registered value
           $newUser = self::$controller::Create($conn, [
               'UUID' => $user->get_ID(),
               'FullName' => $user->get_Name(),
               'Email' =>$user->get_Email(),
               'Password' => $user->get_Password(),
           ]);

           //Return response
           if ($newUser)
           {
               self::$response[] = array('Message' => 'User Registered');
           }
        }
        echo json_encode(self::$response);
    }
}

$view = new UserView();