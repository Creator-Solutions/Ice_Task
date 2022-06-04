<?php

include '../Models/Book.php';

class Book_Controller
{

    private static $stmt;

    private static string $SQL;
    private Book $book;

    private $response;

    public static function Get_Product($conn)
    {

        if ($conn)
        {

            self::$SQL = "SELECT ISBN, Display_Name, Price, Image FROM books";
            self::$stmt = $conn->prepare(self::$SQL);
            self::$stmt->execute();

            while ($row = self::$stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                echo "<div class=card>".
                     "<img src=$row[Image] alt=Clean Code/>".
                     "<div class=info>".
                     "<a href=../../client/Pages/products.php/$row[ISBN] class='card_title'>$row[Display_Name]</a>".
                     "</div>".
                     "<p class=price>R$row[Price]</p>".
                     "<button id=btnAddToCart>Add To Cart</button>".
                     "</div>";
            }
        }
    }

}
