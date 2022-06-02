<?php

class User_Controller
{

    private PDOStatement $stmt;
    private $row;

    private string $SQL;

    private string $email;
    private string $password;


    public function Authenticate($conn, $arr):array
    {
        if ($conn)
        {
            $this->email = $arr['Email'] ?? "";
            $this->password = $arr['Password'] ?? "";

            try
            {
                $this->SQL = "";
                $this->stmt = $conn->prepare($this->SQL);
                $this->stmt->execute();

                $this->row = $this->stmt->fetch();

                if (isset($this->row))
                {
                    if (password_verify($this->password, $this->row['Password']))
                    {
                        return array('Message' => 'Authenticated', 'Token' => $this->Generate_Token(), 'UUID' => $this->row['UUID']);
                    }
                }
            }catch (Exception $ex)
            {
                return array('Message' => 'Could not authenticate');
            }

        }
        return array();
    }

    public function Create($conn, $arr): bool
    {
        if ($conn)
        {
            try
            {

                $this->SQL = "INSERT INTO users (UUID, FullName, Email, Password) VALUES (?,?,?,?)";
                $this->stmt = $conn->prepare($this->SQL);
                $this->execute($arr);

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
        $token = openssl_random_pseudo_bytes(16);
        return bin2hex($token);
    }
}