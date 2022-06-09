<?php

include '../Models/Book.php';

class Book_Controller
{
    //Class Properties
    private static $stmt;

    private static string $SQL;
    private static string $filter_tag;
    private static float $minVal, $maxVal;

    /**
     * Select all books from table
     *
     * @param $conn
     * @return void
     */
    public static function Get_Product($conn)
    {
        if ($conn)
        {
            try
            {
                self::$SQL = "SELECT ISBN, Display_Name, Price, Image FROM books";
                self::$stmt = $conn->prepare(self::$SQL);
                self::filter(self::$stmt);
            }catch (Exception $ex)
            {
                echo "<p>Could not load Products</p>";
            }

        }
    }

    /**
     * Filtering system for specific books
     *
     * @param $conn
     * @param $filter_arr
     * @return void
     */
    public static function Filter_Product($conn, $filter_arr)
    {
        if ($conn)
        {
            self::$filter_tag = $filter_arr['Tag'] ?? "";
            self::$minVal = floatval($filter_arr['Min']) ?? floatval("0");
            self::$maxVal = floatval($filter_arr['Max']) ?? floatval("2000");

            try
            {
                if (isset(self::$filter_tag) && isset(self::$minVal))
                {
                    self::$SQL = "SELECT ISBN, Display_Name, Price, Image FROM books WHERE Tag=? AND Price >= ? AND Price <= ?";
                    self::$stmt = $conn->prepare(self::$SQL);
                    self::$stmt->bindValue(1, self::$filter_tag);
                    self::$stmt->bindValue(2, self::$minVal);
                    self::$stmt->bindValue(3, self::$maxVal);
                }else if (isset(self::$filter_tag))
                {

                    self::$SQL = "SELECT ISBN, Display_Name, Price, Image FROM books WHERE Tag=?";
                    self::$stmt = $conn->prepare(self::$SQL);
                    self::$stmt->bindValue(1, self::$filter_tag);
                }else
                {
                    self::$SQL = "SELECT ISBN, Display_Name, Price, Image FROM books";
                    self::$stmt = $conn->prepare(self::$SQL);
                }

                self::filter(self::$stmt);

            }catch (Exception $ex)
            {
                echo "<p>$ex</p>";
            }
        }
    }

    /**
     * filter response function extracted
     * from both methods
     *
     * @param $stmt
     * @return void
     */
    public static function filter($stmt): void
    {
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            if (count($row) > 0)
            {
                echo "<div class='card' id=$row[ISBN]>" .
                    "<img src=../Images/$row[Image] alt=Clean Code/>" .
                    "<div class=info>" .
                    "<a href=../../client/Pages/products.php/token=$row[ISBN] class='card_title'>$row[Display_Name]</a>" .
                    "</div>" .
                    "<p class='price'>R$row[Price]</p>" .
                    "<button id=$row[ISBN] onclick='Add_To_Cart(this.id)'>Add To Cart</button>" .
                    "</div>";
            }else
            {
                echo "<p>No products matched your request</p>";
            }
        }
    }
}
