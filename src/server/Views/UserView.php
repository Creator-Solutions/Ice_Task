<?php

require '../conn.php';
include '../Controllers/UserController.php';
include '../Models/User.php';

class UserView
{

    private static DatabaseHelper $dbHelper;
    private static User_Controller $controller;
    private static User $user;

    private static $encodedData;
    private static $decodedData;

    private static array $response;

    /**
     * Constructor => Initialize object
     *
     * @return void
     *
     */
    public function __construct()
    {
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$controller = new User_Controller;

        self::UserController(self::$dbHelper::$conn);
    }

    /**
     * Handles Controller Functions
     *
     * @return void
     *
     * @echo json
     *
     */
    public static function UserController($conn)
        {
        self::$encodedData = file_get_contents("php://input");
        self::$decodedData = json_decode(self::$encodedData, true);

        if (self::$decodedData['Type'] == 'Login')
        {
            //Call authentication func
            self::$response[] = self::$controller::Authenticate($conn, self::$decodedData);

        }elseif (self::$decodedData['Type'] == 'Register')
        {

            //Initialize a new user
            self::$user = new User(
                self::$controller::uuidv4(),
                self::$decodedData['FullName'],
                self::$decodedData['Email'],
                password_hash(self::$decodedData['Password'], PASSWORD_ARGON2ID),
                self::$decodedData['Verified']
            );

            //Store registered value
            $newUser = self::$controller::Create($conn, [
                'UUID' => self::$user->get_ID(),
                'FullName' => self::$user->get_Name(),
                'Email' => self::$user->get_Email(),
                'Password' => self::$user->get_Password(),
                'Verified' => self::$user->get_verified()
           ]);

           //Return response
           if ($newUser)
           {
               self::$response[] = array('Message' => 'User Registered', 'Token' => self::$controller::Generate_Token());
           }else
           {
               self::$response[] = array('Message' => 'Could Not Register');
           }
        }
        echo json_encode(self::$response);
    }
}

$view = new UserView();
