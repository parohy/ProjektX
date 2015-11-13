<?php
session_start();
//$_SESSION['loggedin'] = false; //true if logged in, false if not

//$_SESSION['loginErr'] = null; //contains loggin error or login message if successful
//$_SESSION['registerErr'] = null; //contains registration error or registration message if successful
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"> <!-- LOADING MAIN CSS FILE -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/menuScript.js"></script>
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

<!--[if lt IE 9]>
    <p>Do your self a favour <strong>UPDATE YOUR BROWSER!</strong></p>
<![endif]-->

<div id="page-wrapper">

    <!-- BEGGINING OF THE PAGE HEADER-->
    <header id="main-header">

        <div id="title-content">

            <div id="title">
                <img src="img/default-user.png" class="user-image">
                <h1>Welcome

                    <?php
                    /* Je to provizorne riesienie. Po jednom prihlaseni sa meno ulozi uz do prehliadaca cize to meno sa uz zobrazuje po kazdej navsteve stranky.
                     * Mozte to upravit, i dont care.
                     * @author Tomas Paronai */
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    	if(isset($_SESSION['username']))
                        	echo $_SESSION['username'];
                    } else {
                    	echo "guest";
                    }
                    ?>

                </h1>
            </div>

            <div id="search">

                <a href="#" class="faq-help-button">FAQ</a>
                <span>/</span>
                <a href="#" class="faq-help-button">Help</a>

                <div class="search-container">
                        <form action="php/searchHandler.php" method="GET" id="searchform">
                            <input type="text" name="search" class="search" required>
                            <input type="submit" class="search-button" value="">
                        </form>
                </div>

            </div>

        </div>

        <nav id="main-nav">
            <?php
                include "pages/main-nav.php";
            ?>
        </nav>

    </header>
    <!-- ENDING OF THE PAGE HEADER-->

    <!-- BEGGINING OF THE PAGE CONTENT-->
    <div id="content-wrapper">

        <aside id="side-panel">

            <div class="frame-container">

                <div class="frame-titlebar">
                    <span class="frame-title">Login</span>
                </div>
                
                <div class="frame-content login-form">
                    <form action="API/relog.php?register=false" method="POST">

                        <ul class="login-container">
                            <li class="login-item"><label for="usermail">E-mail:</label><span></span></li>
                            <li class="login-item"><input type="text" name="usermail" placeholder="Email..." maxlength="40"><span class="error"></span></li>
                            <li class="login-item"><label for="usermail">Password:</label></li>
                            <li class="login-item"><input type="password" name="password" placeholder="Pasword..." maxlength="30"><span class="error"></span></li>
                            <li class="login-item"><span class="login-dialogue">Do you want to stay logged in ?</span><input type="checkbox" name="stayLoggedin" value="true"></li>
                            <li class="login-item"><a href="?page=forgottenPass">Forgot your password ?</a></li>
                            <li class="login-item"><a href="?page=registration" target="_blank">Not registered yet ?</a></li>
                            <li class="login-item"><input type="submit" value="Log in"></li>
                        </ul>
                    </form>
                </div>

            </div>

            <div class="frame-container embeded-video">

                <div class="frame-titlebar">
                    <span class="frame-title">Video</span>
                </div>

                <div class="frame-content">
                    <iframe width="220" height="220" src="https://www.youtube.com/embed/DvOldr9Cjc8" frameborder="0" allowfullscreen></iframe>
                </div>

            </div>

        </aside>

        <main>

            <?php
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                else {
                    $page = "";
                }

                if($page == "" || $page == "main-page")
                {
                    include "pages/main-page.php";
                }
                else if($page == "registration") {
                    include "pages/registration.php";
                }
                else if($page == "searchResults") {
                    include "pages/searchResults.php";
                }
                else if($page == "productPreview") {
                    include "pages/productPreview.php";
                }
            ?>

        </main>

    </div>
    <!-- ENDING OF THE PAGE CONTENT-->

    <!-- BEGGINING OF THE PAGE FOOOTER-->
    <footer id="main-footer">
	
        <div id="footer-nav">
		
		<div id="picture">
		    <p>GlobalLogic</p>
		</div>
		<div id="footer-butt">
            <a href="#" class="faq-help-button">FAQ</a>
            <span>/</span>
            <a href="#" class="faq-help-button">Help</a>
            <a href="https://www.facebook.com/GYMBOSAK/?fref=ts" id="fb"></a>
        </div>
        </div>
        <div id="copyright">
            <span>Copyright &#169; 2015 Project X Inc. All Rights Reserved. User Agreement, Privacy and Cookies.</span>
        </div>
    </footer>
    <!-- ENDING OF THE PAGE FOOTER-->

</div>

</body>
</html>
