<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            <?php include '../Styles/Login.css' ?>
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>

        <div class="main">
            <div class="container">
                <div class="left">
                    <div class="block">
                        <h1>Login</h1>
                        <div class="input">
                            <input type="email" placeholder="Email" id="txtEmail"/>
                            <img src="../Images/user.png" alt="usr" />
                        </div>
                        <div class="input">
                            <input type="password" placeholder="Password" id="txtPassword"/>
                            <img src="../Images/lock.png" alt="usr" />
                        </div>
                        <div class="heads">
                            <input type="checkbox" id="chkRemember"/>
                            <label for="chkRemember">Remember Me</label>

                            <a>Forgot Password?</a>
                        </div>
                        <input type="button" id="btnLogin" onclick="Login()" value="Login" />

                        <div class="no_acc">
                            <p>Don't have an account? </p>
                            <a>Sign Up</a>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="block">
                        <h2>Welcome Back</h2>
                        <div class="content">
                            <p>
                                All you can read one stop book shop
                            </p>
                        </div>
                        <button>Sign Up</button>
                    </div>

                </div>
            </div>
        </div>

        <footer>
            <p>&copy ST10131873 Owen Burns, 2022</p>
        </footer>

        <script src="../JS/Login.js" type="text/javascript"></script>

    </body>
</html>
