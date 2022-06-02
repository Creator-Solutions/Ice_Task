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

                if (isset(self::$row)) {
                    if (password_verify(self::$password, self::$row['Password'])) {
                        return array('Message' => 'Authenticated', 'Token' => self::Generate_Token(), 'UUID' => self::$row['UUID'], 'Name'=>self::$row['FullName']);
                    }else
                    {
                        return array('Message' => 'Invalid Password');
                    }
                }else
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
                self::$SQL = "INSERT INTO users (UUID, FullName, Email, Password) VALUES (?,?,?,?)";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->execute($arr);

                return true;
            }catch(Exception $ex)
            {
                return false;
            }
        }
        return false;
    }

    public function Generate_Token(): string
    {

        /**
         * Creates Authentication Token For User
         * @return string
         */
        $token = openssl_random_pseudo_bytes(16);
        return bin2hex($token);
    }
}