<?php

class User
{

    //Class attributes
    private string $uuid;
    private string $fullName;
    private string $email;
    private string $password;
    private string $verified;

    /**
     * Class Constructor => initialize class attributes
     *
     *
     * @param $uuid
     * @param $name
     * @param $email
     * @param $password
     * @param $verified
     */
    public function __construct($uuid, $name, $email, $password, $verified)
    {
        $this->uuid = $uuid;
        $this->fullName = $name;
        $this->email = $email;
        $this->password = $password;
        $this->verified = $verified;
    }

    /**
     * Returns ID
     *
     * @return string
     */
    public function get_ID(): string
    {
        return $this->uuid;
    }

    /**
     * Returns Name
     *
     * @return string
     */
    public function get_Name():string
    {
        return $this->fullName;
    }

    /**
     * Returns Email
     *
     * @return string
     */
    public function get_Email():string
    {
        return $this->email;
    }


    /**
     * Returns Password
     *
     * @return string
     */
    public function get_Password():string
    {
        return $this->password;
    }

    /**
     * Returns Verified
     *
     * @return string
     */
    public function get_verified():string
    {
        return $this->verified;
    }
}
