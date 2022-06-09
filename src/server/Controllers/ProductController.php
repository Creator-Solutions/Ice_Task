<?php

include '../Models/Product.php';

class Product_Controller
{
    //Class Properties
    private static Product $product;

    private static string $SQL;
    private static string $sku;

    private static PDOStatement $stmt;
    private static $row;

    private static Array $response;

    /**
     * Fetch all products in database
     *
     *
     * @param $conn
     * @param $token
     * @return array
     */
    public static function Get_Product($conn, $token):array
    {

        if ($conn)
        {
            self::$sku = $token ?? "";

            try
            {
                self::$SQL = "SELECT admin.Admin_Name, books.Book_Name, books.ISBN, books.Description, books.InStock, books.Price, books.Image FROM books INNER JOIN admin ON books.Admin_ID = admin.Admin_ID WHERE books.Admin_ID = admin.Admin_ID AND books.ISBN=?";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->bindValue(1, self::$sku);
                self::$stmt->execute();

                //Append table row to list
                self::$row = self::$stmt->fetch();

                if (isset(self::$row))
                {
                    self::$product = new Product(self::$row);

                    self::$response[] = array(
                        'Admin_Name' => self::$product->getAdminName(),
                        'ISBN' => self::$product->getIsbn(),
                        'Book_Name' => self::$product->getBookName(),
                        'Description' => self::$product->getDescription(),
                        'InStock' => self::$product->getInstock(),
                        'Price' => self::$product->getPrice(),
                        'Image' => self::$product->getImage()
                    );
                }
                return self::$response;
            }catch (Exception $ex)
            {
                self::$response[] = array('Message' => 'Could Not Find Product');
            }
        }
        //return empty array if no producs found
        return array();
    }
}
