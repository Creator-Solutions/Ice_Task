<?php

class User_Controller
{

    private static $stmt;
    private static $row;

    private static string $SQL;

    private static string $email;
    private static string $password;

    public static function Authenticate($conn, $arr):array
    {
        /**
         * Handles user authentication
         * @param $conn
         * @param $arr
         * @return array|string[]
         */

        if ($conn)
        {
            self::$email = $arr['Email'] ?? "";
            self::$password = $arr['Password'] ?? "";

            try
            {
                self::$SQL = "SELECT UUID, FullName, Email, Password FROM users WHERE Email=?";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->bindValue(1, self::$email);
                self::$stmt->execute();

                self::$row = self::$stmt->fetch();

                if (isset(self::$row))
                {
                    if (password_verify(self::$password, self::$row['Password'])) {
                        session_start();
                        $_SESSION['Type'] = 'Student';
                        $_SESSION['UUID'] = self::$row['UUID'];
                        $_SESSION['Token'] = self::Generate_Token();
                        $_SESSION['Email'] = self::$row['Email'];
                        $_SESSION['Name'] = self::$row['FullName'];

                        return array('Message' => 'Authenticated', 'Token' => self::Generate_Token(), 'UUID' => self::$row['UUID'], 'Name'=>self::$row['FullName']);
                    }else
                    {
                        return array('Message' => 'Invalid Password');
                    }
                }elseif (!isset(self::$row))
                {
                    return array('Message' => 'Account Not Found');
                }
            }catch (Exception $ex)
            {
                return array('Message' => "Exception: {$ex->getMessage()}");
            }
        }
        return array();
    }

    public static function Authenticate_Admin($conn, $arr):array
    {
        /**
         * Handles user authentication
         * @param $conn
         * @param $arr
         * @return array|string[]
         */

        if ($conn)
        {
            self::$email = $arr['Email'] ?? "";
            self::$password = $arr['Password'] ?? "";

            try
            {
                self::$SQL = "SELECT Admin_ID, Admin_Name, Admin_Email, Admin_Password FROM admin WHERE Admin_Email=?";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->bindValue(1, self::$email);
                self::$stmt->execute();

                self::$row = self::$stmt->fetch();

                if (isset(self::$row))
                {
                    if (password_verify(self::$password, self::$row['Admin_Password'])) {
                        session_start();
                        $_SESSION['Type'] = 'Admin';
                        $_SESSION['UUID'] = self::$row['Admin_ID'];
                        $_SESSION['Token'] = self::Generate_Token();
                        $_SESSION['Email'] = self::$row['Admin_Email'];
                        $_SESSION['Name'] = self::$row['Admin_Name'];

                        return array('Message' => 'Authenticated', 'Token' => self::Generate_Token(), 'UUID' => self::$row['Admin_ID'], 'Name'=>self::$row['Admin_Name']);
                    }else
                    {
                        return array('Message' => 'Invalid Password');
                    }
                }elseif (!isset(self::$row))
                {
                    return array('Message' => 'Account Not Found');
                }
            }catch (Exception $ex)
            {
                return array('Message' => "Exception: {$ex->getMessage()}");
            }
        }
        return array();
    }


    public static function Create($conn, $arr): bool
    {
        /**
         * Handles new creation of users in Database
         * @param $conn
         * @param $arr
         * @return bool
         */

        if ($conn)
        {
            try
            {
                self::$SQL = "INSERT INTO users (UUID, FullName, Email, Password, Verified) VALUES (?,?,?,?, ?)";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->bindValue(1, $arr['UUID']);
                self::$stmt->bindValue(2, $arr['FullName']);
                self::$stmt->bindValue(3, $arr['Email']);
                self::$stmt->bindValue(4, $arr['Password']);
                self::$stmt->bindValue(5, $arr['Verified']);
                self::$stmt->execute();

                return true;
            }catch(Exception $ex)
            {
                return false;
            }
        }
        return false;
    }

    public static function Generate_Token(): string
    {

        /**
         * Creates Authentication Token For User
         * @return string
         */
        $token = openssl_random_pseudo_bytes(16);
        return bin2hex($token);
    }

    /**
     * Creates Unique user id for each user
     *
     * @return string
     */
    public static function uuidv4():string
    {
        return sprintf( '%04x%04x-%04x-%04x-%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            mt_rand(0, 0xffff),

            mt_rand(0, 0x0fff) | 0x4000,

            mt_rand(0, 0x3fff) | 0x8000,

            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
