<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product || </title>
    <style>
        <?php include '../Styles/product.css' ?>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<?php include 'header.php'  ?>
    <div class="main">
        <div class="content">
            <p class="product_title" id="title"></p>
            <div class="contain">
                <div class="left">
                    <img src="../../Images/computer_network.jpg" id="imgIcon"/>
                    <p class="isbn" id="isbn"><span id="isbnSpan">ISBN(13): </span>978-0132126953</p>
                </div>
                <div class="right">
                    <div class="block">
                        <p class="head">Buy Used: </p>
                        <p class="price" id="price"></p>
                        <div class="info">
                            <p class="quality"><span>Used: </span>Very Good</p>
                            <p class="seller" id="seller"></p>
                            <p class="stock" id="stock"></p>
                        </div>
                    </div>
                    <div class="sidebar">
                        <p>Self-collect: <span id="collection"></span> Order <br>within 15 hrs 14 mins</p>
                        <br>
                        <p>Or fastest delivery <span>Friday, June 10</span></p>
                        <button>Add To Cart</button>
                    </div>
                </div>
            </div>
            <div class="desc">
                <h2>Product Summary</h2>
                <p class="description" id="description">
                    Set up a secure network at home or the office
                    <br><br>
                    Fully revised to cover Windows 10 and Windows Server 2019, this new edition of the trusted Networking For Dummies helps both beginning network administrators and home users to set up and maintain a network.
                    Updated coverage of broadband and wireless technologies, as well as storage and back-up procedures,
                    ensures that you’ll learn how to build a wired or wireless network, secure and optimize it,
                    troubleshoot problems, and much more.   From connecting to the Internet and setting up a wireless
                    network to solving networking problems and backing up your data—this #1 bestselling guide covers it all.
                    Build a wired or wireless network Secure and optimize your network Set up a server and manage Windows user accounts Use the cloud—safely
                    <br><br>
                    Written by a seasoned technology author—and jam-packed with tons of helpful step-by-step instructions—this is the book network administrators and everyday computer users will turn to again and again.
                </p>
            </div>
        </div>

    </div>


    <script src="../../JS/product.js" type="text/javascript"></script>

</body>
</html>