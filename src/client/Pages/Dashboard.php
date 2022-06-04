<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>BookShop || Store</title>
    <style>
        <?php include '../Styles/dashboard.css'  ?>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php include 'header.php'  ?>


    <div class="filter">
        <div class="top">
            <p>Filter</p>
        </div>
        <div class="category">
            <p class="title">Category</p>
            <div class="cat_list">
                <input type="checkbox" id="chkNetworking">
                <label for="chkNetworking">Networking</label>

                <input type="checkbox" id="chkProg">
                <label for="chkProg">Programming</label>

                <input type="checkbox" id="chkManage">
                <label for="chkManage">Project Management</label>

                <input type="checkbox" id="chkBusiness">
                <label for="chkBusiness">Business Studies</label>
            </div>
        </div>
        <div class="price_range">
            <p>Price Range</p>

            <div class="value">
                <p class="minVal">R</p>
                <input type="text" placeholder="0"/>
                <p class="maxVal">R</p>
                <input type="text" placeholder="0"/>
            </div>
        </div>

        <button>Apply Filter</button>
    </div>

    <div class="parent">
        <h2>Home/<span> Shop</span></h2>

        <div class="container" id="container">

        </div>
    </div>

    <script src="../JS/Dashboard.js" type="text/javascript"></script>

</body>
</html>