<?php

class User_Controller
{

    private static PDOStatement $stmt;
    private static $row;

    private static string $SQL;
    private static string $email;
    private static string $password;


    public static function Authenticate($conn, $arr):array
    {
        if ($conn)
        {
            self::$email = $arr['Email'] ?? "";
            self::$password = $arr['Password'] ?? "";

            try
            {
                self::$SQL = "";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->execute();

                self::$row = self::$stmt->fetch();

                if (isset(self::$row))
                {
                    if (password_verify(self::$password, self::$row['Password']))
                    {
                        return array('Message' => 'Authenticated', 'Token' => self::Generate_Token(), 'UUID' => self::$row['UUID']);
                    }
                }

            }catch (Exception $ex)
            {
                return array('Message' => 'Could not authenticate');
            }

        }
        return array();
    }

    public static function Create($conn, $arr)
    {
        if ($conn)
        {
            
        }
    }

    public static function Generate_Token(): string
    {
        $token = openssl_random_pseudo_bytes(16);
        return bin2hex($token);
    }
}