<?php

class StudentController
{
    //class properties
    private static string $SQL;
    private static $stmt;

    private static string $admin_ID;
    private static string $book_name;
    private static string $isbn;
    private static string $display_name;
    private static string $description;
    private static string $price;
    private static string $image;

    /**
     * Fetch list of students that aren't verified
     *
     *
     * @param $conn
     * @return void
     */
    public static function Get_Student ( $conn )
    {
        if ( $conn ) {

            self::$SQL = "SELECT * FROM users WHERE Verified = 0";
            self::$stmt = $conn -> prepare ( self::$SQL );
            self::$stmt -> execute ();

            echo "<table>" .
                "<tr>" .
                "<th>ID</th>" .
                "<th>Name</th>" .
                "<th>Email</th>" .
                "<th colspan=3 class=action>Action</th>" .
                "</tr>";
            while ( $row = self::$stmt -> fetch ( PDO::FETCH_ASSOC , PDO::FETCH_ORI_NEXT ) ) {
                if ( count ( $row ) > 0 ) {
                    echo "<tr>" .
                        "<td>$row[UUID]</td>" .
                        "<td>$row[FullName]</td>" .
                        "<td>$row[Email]</td>" .
                        "<td><button class=btnverify id=$row[UUID] onclick=Verify_User(this.id)>Verify</button></td>" .
                        "<td><button class=btnremove id=$row[UUID] onclick=Remove_User(this.id)>Remove</button></td>" .
                        "</tr>";
                } else {
                    echo "<td>No student found</td>";
                }
                echo "</table>";
            }
        }
    }

    /**
     * Handles requests to upload books into the system
     *
     *
     * @param $conn
     * @return void
     */
    public static function Get_Book ( $conn )
    {
        if ( $conn ) {
            self::$SQL = "SELECT * FROM requests";
            self::$stmt = $conn -> prepare ( self::$SQL );
            self::$stmt -> execute ();

            echo "<table>" .
                "<tr>" .
                "<th>ISBN</th>" .
                "<th>Display Name</th>" .
                "<th>Price</th>" .
                "<th>Seller</th>" .
                "<th colspan=3 class=action>Action</th>" .
                "</tr>";
            while ( $row = self::$stmt -> fetch ( PDO::FETCH_ASSOC , PDO::FETCH_ORI_NEXT ) ) {
                if ( count ( $row ) > 0 ) {
                    echo "<tr>" .
                        "<td>$row[ISBN]</td>" .
                        "<td>$row[Display_Name]</td>" .
                        "<td>$row[Price]</td>" .
                        "<td>$row[Email]</td>" .
                        "<td><button class=btnverify id=$row[ISBN] onclick=Accept_Request(this.id)>Accept</button></td>" .
                        "<td><button class=btnremove id=$row[ISBN] onclick=Decline_Request(this.id)>Decline</button></td>" .
                        "</tr>";
                } else {
                    echo "<td>No product found</td>";
                }
                echo "</table>";
            }
        }
    }

    /**
     * Handles the verification of a user
     *
     *
     * @param $conn
     * @param $arr
     * @return array|string[]
     */
    public static function Verify_User ( $conn , $arr ) : array
    {
        if ( $conn ) {
            $id = $arr[ 'ID' ] ?? "";
            try {
                self::$SQL = "UPDATE users SET Verified=1 WHERE UUID=? ";
                self::$stmt = $conn -> prepare ( self ::$SQL );
                self::$stmt -> bindValue ( 1 , $id );
                self::$stmt -> execute ();

                return array ( 'Message' => 'Success' );

            } catch ( Exception $ex ) {
                return array ( 'Message' , 'Could not verify user' );
            }
        }

        return array ();
    }

    /**
     * Handles the record removal of a student
     *
     *
     * @param $conn
     * @param $arr
     * @return array|string[]
     */
    public static function Remove_User ( $conn , $arr ) : array
    {
        if ( $conn ) {
            $UUID = $arr[ 'ID' ] ?? "";
            try {

                self::$SQL = "DELETE FROM users WHERE UUID=?";
                self::$stmt = $conn -> prepare ( self::$SQL );
                self::$stmt -> bindValue ( 1 , $UUID , PDO::PARAM_STR );
                self::$stmt -> execute ();

                return array ( 'Message' => 'User Removed' );

            } catch ( Exception $ex ) {
                return array ( 'Message' => 'Failed to remove user' );
            }
        }
        return array ();
    }

    /**
     * Declines the request to upload a book into the system
     *
     *
     * @param $conn
     * @param $arr
     * @return array|string[]
     */
    public static function Remove_Request ( $conn , $arr ) : array
    {
        if ( $conn ) {
            $isbn = $arr[ 'ISBN' ] ?? "";
            try {
                self::$SQL = 'DELETE FROM requests WHERE ISBN=? ';
                self::$stmt = $conn -> prepare ( self::$SQL );
                self::$stmt -> bindValue ( 1 , $isbn );
                self::$stmt -> execute ();

                return array ( 'Message' => 'Request Declined' );

            } catch ( Exception $ex ) {
                return array ( 'Message' => 'Could not decline request' );
            }
        }
        return array ();
    }

    /**
     * Handles product upload approval
     *
     *
     * @param $conn
     * @param $arr
     * @return array|string[]
     */
    public static function Accept_Request ( $conn , $arr ) : array
    {
        if ( $conn ) {
            self::$isbn = $arr[ 'ISBN' ] ?? "";

            if ( self::Check_Book_Exists ( $conn , self::$isbn ) ) {
                return array ( 'Message' => 'Product already exists' );
            } else {
                try {
                    return array ( 'Message' => 'Product Request Accepted Accepted' );
                } catch ( Exception $ex ) {
                    return array ( 'Message' => 'Could not accept request' );
                }
            }
        }
        return array ();
    }

    /**
     * Check if book is not already in the system
     *
     *
     * @param $conn
     * @param $isbn
     * @return bool
     */
    public static function Check_Book_Exists ( $conn , $isbn ) : bool
    {
        if ( $conn ) {
            try {
                self::$SQL = "SELECT * from books WHERE ISBN=?";
                self::$stmt = $conn -> prepare ( self::$SQL );
                self::$stmt -> bindValue ( 1 , $isbn );
                self::$stmt -> execute ();

                return true;
            } catch ( Exception $ex ) {
                return false;
            }
        }
        return false;
    }
}
