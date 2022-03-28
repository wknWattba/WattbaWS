<DOCTYPE! HMTL>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type ="text/javascript" src ="../js/loginSiteAdmin.js"></script>
        <title> Wattba - Site Admin </title>
    </head>
    <a onclick=login();> Press me </a>
    <body>
        <div class = "header">
            <h2> Login to your Admin Account </h2>
        </div>
        <form method="post">
            <div class = "login">
                <label for = "user"><b>Username</b></label>
                <input id = "username" type = "text" placeholder = "Enter Username" name = "username" required>
                </br>

                <label for = "pass"><b>Password</b></label>
                <input id = "password" type = "password" placeholder = "Enter Password" name= "password" required>
                </br>
                </br>
                
                <button id = "iamabutton" type = "submit">Login</button>
            </div>
        </form>
    </body>
</html>