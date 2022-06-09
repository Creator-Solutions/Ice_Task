<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify Requests</title>
    <style>
        <?php include '../Styles/Student.css'  ?>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <?php include 'header.php'  ?>

    <div class="verify" id="verification">
        <div class="top">
            <p>Requires Verification</p>
        </div>

        <div class="table" id="table">

        </div>

    </div>

    <div class="products">
        <p>Requested Books</p>
        <div class="table" id="productTable">

        </div>
    </div>

    <script src="../JS/Student.js" type="text/javascript"></script>
</body>
</html>
