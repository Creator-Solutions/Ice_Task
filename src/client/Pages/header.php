<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');

        *{
            margin: 0;
            padding: 0;
        }

        .main {
            width: 100%;
            height: 100%;
        }

        .main .container{
            width: 100%;
            height: 65px;
            background-color: #24252A;
            color: #fff;
            position: relative;
            z-index: 100;
        }

        .main .container .block{
            width: 75%;
            height: 65px;
            display: flex;
            margin: auto;
        }

        .main .container .block .title{
            font-size: 26px;
            font-family: 'Roboto Condensed', sans-serif;
            align-self: center;
        }

        .main .container .block .nav{
            width: 20%;
            height: 65px;
            display: flex;
            justify-content: space-evenly;
            margin: auto;
        }

        .main .container .block .nav a{
            align-self: center;
            margin-left: 15px;
            font-size: 18px;
            font-family: 'Roboto Condensed', sans-serif;
            text-decoration: none;
            color: #fff;
        }

        .main .container .block .nav a:hover{
            cursor: pointer;
            color: #ff9f00;
        }

        .main .container .block .user{
            align-self: center;
            font-family: 'Roboto Condensed', sans-serif;
        }

        .main .container .block .user:hover{
            cursor: pointer;
            color: #ff9f00;
        }
    </style>
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="block">
                <p class="title">BookShop</p>

                <div class="nav">
                    <a href="Dashboard.php">Home</a>
                    <?php
                        if (isset($_SESSION['Type']) && $_SESSION['Type'] == 'Student'){
                            echo "<a href='Cart.php' id='cart'>Cart (0)</a>";
                        }elseif (isset($_SESSION['Type']) && $_SESSION['Type'] == 'Admin')
                        {
                            echo "<a>Students</a>";
                        }
                    ?>
                    <a href="Sell.php">Sell a book</a>
                    <?php
                        if (isset($_SESSION['Type']))
                        {
                            echo "<a>Logout</a>";
                        }else
                        {
                            echo "<a href='Login.php'>Sign In</a>";
                        }
                    ?>

                </div>

                <p class="user" >
                   <?php
                    if (isset($_SESSION['Email']))
                    {
                        echo $_SESSION['Email'];
                    }else
                    {
                        echo "Guest";
                    }
                   ?>
                </p>

            </div>
        </div>
    </div>

</body>
</html>
