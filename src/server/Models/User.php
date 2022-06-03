<?php

class User
{

    private string $uuid;
    private string $fullName;
    private string $email;
    private string $password;
    private string $verified;

    public function __construct($uuid, $name, $email, $password, $verified)
    {
        $this->uuid = $uuid;
        $this->fullName = $name;
        $this->email = $email;
        $this->password = $password;
        $this->verified = $verified;
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

    public function get_verified():string
    {
        return $this->verified;
    }
}
