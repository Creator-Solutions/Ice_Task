<?php

class User
{

    private static string $uuid;
    private static string $fullName;
    private static string $email;
    private static string $password;

    public function __construct($uuid, $name, $email, $password)
    {
        self::$uuid = $uuid;
        self::$fullName = $name;
        self::$email = $email;
        self::$password = $password;
    }

    public static function get_ID(): string
    {
        return self::$uuid;
    }

    public static function get_Name():string
    {
        return self::$fullName;
    }

    public static function get_Email():string
    {
        return self::$email;
    }

    public static function get_Password():string
    {
        return self::$password;
    }
}
