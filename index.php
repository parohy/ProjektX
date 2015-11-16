<?php
session_start();

include "API/Database.php";

if(isset($_GET['product'])) {
    if(!isset($_COOKIE[$_GET['product']])) setcookie($_GET['product'],"false", 60 * 60 * 24 * 60 + time(),"/");

    if(isset($_COOKIE[$_GET['product']]) == "false") {
        if(isset($_GET['rating'])) {
            setcookie($_GET['product'],"true", 60 * 60 * 24 * 60 + time(),"/");
            print_r($_COOKIE['rating']);

            $handler = new DBHandler();
            $handler->beginTransaction();
            $handler->query('SELECT numofratings,sumofratings FROM products WHERE productid=:id');
            $handler->bind(":id",$_GET['product']);
            $ratingResult = $handler->singleRecord();

            $ratingResult['numofratings'] += 1;
            $ratingResult['sumofratings'] += $_GET['rating'];

            $handler->query('UPDATE products SET numofratings=:numofratings,sumofratings=:sumofratings WHERE productid=:id');
            $handler->bind(":numofratings", $ratingResult['numofratings']);
            $handler->bind(":sumofratings", $ratingResult['sumofratings']);
            $handler->bind(":id", $_GET['product']);
            $handler->execute();
            $handler->endTransaction();

            header('/?page=productPreview&product=' . $_GET['product']);
        }
    }
}

if(isset($_GET['login']) && $_GET['login'] == 'false') {
    session_destroy();
    header('Location: ?page=main-page','Content-Type: text/html; charset=UTF-8');
    exit();
}

//$_SESSION['loggedin'] = false; //true if logged in, false if not

//$_SESSION['loginErr'] = null; //contains loggin error or login message if successful
//$_SESSION['registerErr'] = null; //contains registration error or registration message if successful
//$_SESSION['editErr'] //edit error message;
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
                    <span class="frame-title">
                    <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
                        echo "Profil";
                    } else {
                        echo "Login";
                    }
                    ?>
                   </span>
                </div>

                <div class="frame-content login-form">
                    <?php
                      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
                          include "pages/profile.php";
                      } else {
                          include "pages/loginForm.php";
                      }
                    ?>
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
