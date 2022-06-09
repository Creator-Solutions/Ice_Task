<?php

class UploadController
{

    private static DatabaseHelper $Dbhelper;

    private static string $SQL;
    private static $stmt;
    private static array $response;

    private static string $email;
    private static string $book_name;
    private static string $isbn;
    private static string $display_name;
    private static string $description;
    private static string $price;
    private static string $image;


    public static function Request_Book($conn, $arr):array
    {
        if ($conn)
        {
            self::$email = $arr['Email'] ?? "";
            self::$book_name = $arr['Name'] ?? "";
            self::$display_name = $arr['Display'] ?? "";
            self::$description = $arr['Description'] ?? "";
            self::$price = $arr['Price'] ?? "";
            self::$image = $arr['Image'] ?? "";
            self::$isbn = $arr['ISBN'] ?? "";

            try
            {

                self::$SQL = "INSERT INTO requests(Email, ISBN, Book_Name, Display_Name, Description, Price, Image) VALUES(?,?,?,?,?,?,?)";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->bindValue(1, self::$email);
                self::$stmt->bindValue(2, self::$isbn);
                self::$stmt->bindValue(3, self::$book_name);
                self::$stmt->bindValue(4, self::$display_name);
                self::$stmt->bindValue(5, self::$description);
                self::$stmt->bindValue(6, self::$price);
                self::$stmt->bindValue(7, self::$image);

                self::$stmt->execute();

                return array('Message' => 'Request Process Complete');

            }catch (Exception $ex)
            {
                return array('Message' => 'Could not process request');
            }
        }

        return array();
    }

}
