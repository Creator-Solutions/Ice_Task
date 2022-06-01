<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
            <?php include '../Styles/Login.css' ?>
        </style>
    </head>
    <body>

        <div class="main">
            <div class="container">
                <div class="left">
                    <div class="block">
                        <h1>Login</h1>
                        <div class="input">
                            <input type="email" placeholder="Email"/>
                            <img src="../Images/user.png" alt="usr" id="txtEmail"/>
                        </div>
                        <div class="input">
                            <input type="password" placeholder="Password"/>
                            <img src="../Images/lock.png" alt="usr" id="txtPassword"/>
                        </div>
                        <div class="heads">
                            <input type="checkbox" id="chkRemember"/>
                            <label for="chkRemember">Remember Me</label>

                            <a>Forgot Password?</a>
                        </div>
                        <button id="btnLogin">Login</button>

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

    </body>
</html>
