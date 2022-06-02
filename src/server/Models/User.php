<?php

class User
{

    private string $uuid;
    private string $fullName;
    private string $email;
    private string $password;

    public function __construct($uuid, $name, $email, $password)
    {
        self::$uuid = $uuid;
        self::$fullName = $name;
        self::$email = $email;
        self::$password = $password;
    }

    public function get_ID(): string
    {
        return $this->uuid;
    }

    public function get_Name():string
    {
        return $this->fullName;
    }

    public function get_Email():string
    {
        return $this->email;
    }

    public function get_Password():string
    {
        return $this->password;
    }
}
