<?php

session_start();

class CartController
{
    //Class Properties
    private static string $SQL;
    private static $stmt;

    private static float $subTotal;

    private static string $uuid;
    private static string $isbn;
    private static string $order_id;
    private static string $order_total;
    private static string $order_date;
    private static string $deliver_method;


    /**
     * Adds items to cart (Session super global)
     *
     * @param $arr
     * @return int
     */
    public static function Add_To_Cart($arr): int
    {
        if (empty($_SESSION['Cart']))
        {
            $_SESSION['Cart'] = array();
        }

        $_SESSION['Cart'][] = $arr['SKU'];

        return count($_SESSION['Cart']);
    }


    /**
     * Return cards of items in cart
     *
     *
     * @param $conn
     * @return void
     */
    public static function View_Cart($conn)
    {
        $whereIn = "";
        if ($conn)
        {
            if (isset($_SESSION['Cart']))
            {
                $whereIn = implode(',', $_SESSION['Cart']);
            }
            try {
                self::$SQL = "SELECT admin.Admin_Name, books.ISBN, books.Display_Name, books.Price, books.Image FROM books INNER JOIN admin ON books.Admin_ID = admin.Admin_ID WHERE books.ISBN IN ('" . str_replace(",", "','", $whereIn) . "')";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->execute();

                while ($row = self::$stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
                {
                    echo "<div class='card'>" .
                        "<img src=../Images/$row[Image] alt='$row[Image]' />" .
                        "<div class='info'>" .
                        "<p class='title'>$row[Display_Name]</p>" .
                        "<p>$row[Admin_Name]</p>" .
                        "</div>" .
                        "<div class='scale'>" .
                        "<p class='price'>R$row[Price]</p>" .
                        "<label for=txtQty>Quantity: </label>" .
                        "<input type=text placeholder=1 id=txtQty />" .
                        "</div>" .
                        "<img src=../Images/delete.png alt=Delete class='imgDelete' id=$row[ISBN] onclick='Remove_Item(this.id)'/>" .
                        "</div>";
                }
            } catch (Exception $ex)
            {
                echo "<p>$ex</p>";
            }
        }
    }

    /**
     * Calculates Sub Total of all the items in cart
     *
     *
     * @param $conn
     * @return float
     */
    public static function Total($conn):float
    {
        if ($conn)
        {
            self::$subTotal = 0.0;
            $whereIn = implode(',', $_SESSION['Cart']);
            try
            {
                self::$SQL = "SELECT Price FROM books WHERE ISBN IN ('" . str_replace(",", "','", $whereIn) . "')";
                self::$stmt = $conn->prepare(self::$SQL);
                self::$stmt->execute();

                while ($row = self::$stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
                {
                    self::$subTotal = self::$subTotal + $row['Price'];
                }
               return self::$subTotal;
            } catch (Exception $ex)
            {
                echo "<p>$ex</p>";
            }
        }

        return self::$subTotal;
    }

    /**
     * Handles removing item from cart
     *
     *
     * @param $arr
     * @return void
     */
    public static function Remove_Item($arr)
    {
        $index = $arr['Token'];

       if ($result = array_Search($index, $_SESSION['Cart']))
       {
          unset($_SESSION['Cart'][$result]);
       }
    }

    /**
     * Handles the creating of orders
     * -> stores orders in database
     *
     *
     * @param $conn
     * @param $arr
     * @return bool
     */
    public static function Order_Item($conn, $arr):bool
    {
        if ($conn)
        {
            self::$uuid = $arr['ID'];
            self::$order_date = $arr['Order_Date'];
            self::$order_id = $arr['Order_ID'];
            self::$order_total = $arr['Order_Total'];
            self::$deliver_method = $arr['Delivery_Method'];

            $i = 0;
            while ($i < count($_SESSION['Cart']))
            {
               try
               {
                   self::$SQL = "INSERT INTO orders(Order_ID, ISBN, UUID, Order_date, Order_Total, Delivery_Method) VALUES (?,?,?,?,?,?)";
                   self::$stmt = $conn->prepare(self::$SQL);
                   self::$stmt->bindValue(1, self::$order_id);
                   self::$stmt->bindValue(2, $_SESSION['Cart'][$i]);
                   self::$stmt->bindValue(3, self::$uuid);
                   self::$stmt->bindValue(4, self::$order_date);
                   self::$stmt->bindValue(5, self::$order_total);
                   self::$stmt->bindValue(6, self::$deliver_method);

                   self::$stmt->execute();
                   $i++;

                   if ($i == count($_SESSION['Cart']))
                   {
                      return true;
                   }
               }catch(Exception $ex)
               {
                   echo $ex;
                   return false;
               }
            }
        }

        return false;
    }
}
