<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>BookShop || Sell A Book</title>
    <style>
        <?php include '../Styles/Sell.css' ?>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <?php  include 'header.php' ?>

    <div class="parent">
       <div class="form">
           <h2>Upload a product</h2>

           <div class="inputs">
               <input type="text" placeholder="Book Name" id="txtBookName" />
               <input type="text" placeholder="Shortened Book Display Name" id="txtDisplayName" />
               <input type="text" placeholder="ISBN (13)" id="txtISBN" />
               <input type="text" placeholder="Price" id="txtPrice" />
               <textarea id="txtDescription" placeholder="Description...."></textarea>
               <input type="text" placeholder="Student Email" id="txtStudentEmail" />
               <input type="file" id="txtImage"/>
               <button onclick="Upload()">Upload Book</button>
           </div>
       </div>
    </div>

    <script src="../JS/Upload.js" type="text/javascript"></script>

</body>
</html>
