<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Web-control</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"> <!-- LOADING MAIN CSS FILE -->
    <link rel="stylesheet" type="text/css" href="css/web-control.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->
</head>
<body>
    <div id="page-wrapper">
        <div class="frame-container web-control-login">
            <div class="frame-titlebar"><span class="frame-title">Login</span></div>
            <div class="frame-content">
                <ul class="login-container">
                    <li class="login-item"><label for="usermail">E-mail:</label></li>
                    <li class="login-item"><input type="text" name="usermail" placeholder="Email..." maxlength="40"></li>
                    <li class="login-item"><label for="usermail">Password:</label></li>
                    <li class="login-item"><input type="password" name="password" placeholder="Pasword..." maxlength="30"></li>
                    <li class="login-item"><input type="submit" value="Log in"></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>