<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        <?php include '../Styles/SignUp.css' ?>
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
                        <input type="text" placeholder="Full Name" id="txtFullName"/>
                        <img src="../Images/lock.png" alt="usr" />
                    </div>
                    <div class="input">
                        <input type="email" placeholder="Email" id="txtEmail"/>
                        <img src="../Images/user.png" alt="usr" />
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" id="txtPassword"/>
                        <img src="../Images/lock.png" alt="usr" />
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Confirm Password" id="txtConfirmPass"/>
                        <img src="../Images/lock.png" alt="usr" />
                    </div>

                    <input type="button" id="btnRegister" value="Register" onclick="SignUp()" />

                </div>
            </div>
            <div class="right">
                <div class="block">
                    <h2>Welcome!</h2>
                    <div class="content">
                        <p>
                            Join thousands of other students and acquire
                            the resources to ace your degree

                        </p>
                    </div>
                    <button onclick="Navigate()">Sign In</button>
                </div>

            </div>
            </div>
        </div>
    </div>

    <script src="../JS/SignUp.js" type="text/javascript"></script>
</body>
</html>