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

<!-- BEGGINING OF THE PAGE-->
<div id="page-wrapper">

    <!-- BEGGINING OF THE PAGE HEADER-->
    <header id="main-header">

        <!-- BEGGINING OF THE TITLE CONTENT-->
        <div id="title-content">

            <!-- BEGGINING OF THE TITLE-->
            <div id="title">
                <img src="img/default-user.png" class="user-image">
                <h1>Welcome <?php echo "TO DO"; ?></h1>
            </div>
            <!-- ENDING OF THE TITLE-->

            <!-- BEGGINING OF THE SAERCH CONTAINER-->
            <div id="search">

                <!-- BEGGINING OF THE FAQ/HELP BUTTONS-->
                <a href="#" class="faq-help-button">FAQ</a>
                <span>/</span>
                <a href="#" class="faq-help-button">Help</a>
                <!-- ENDING OF THE FAQ/HELP BUTTONS-->

                <!-- BEGGINING OF THE SAERCH BAR-->
                <div class="search-container">
                        <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  id="searchform">
                            <input type="text" name="search" class="search">
                            <button class="search-button" name="search-button" value="Search"></button>
                        </form>
                </div>
                <!-- ENDING OF THE SAERCH BAR--->

            </div>
            <!-- ENDING OF THE SAERCH CONTAINER-->

        </div>
        <!-- ENDING OF THE TITLE CONTENT-->

        <!-- BEGGINING OF THE MAIN NAVIGATION-->
        <nav id="main-nav">
            <?php
                include "pages/main-nav.php";
            ?>
        </nav>
        <!-- ENDING OF THE MAIN NAVIGATION-->

    </header>
    <!-- ENDING OF THE PAGE HEADER-->

    <!-- BEGGINING OF THE PAGE CONTENT-->
    <div id="content-wrapper">

        <!-- BEGGINING OF SIDE PANEL -->
        <aside id="side-panel">

            <!-- BEGGINING OF LOGIN OF FORM -->
            <div class="frame-container">

                <div class="frame-titlebar">
                    <span class="frame-title">Login</span>
                </div>
				
				<?php
					
				include 'php/valid.php';
				
				$security = new Security("localhost");
				$usermail = $password = "";
				$loginErr = $nameErr = $passErr = "";
				
				if($_SERVER['REQUEST_METHOD']=='POST'){
					
					
					if($security->inputCheck($_POST['usermail'])){
						$usermail = $_POST['usermail'];
					}
					else{
						$nameErr = "Enter usermail";
					}
					if($security->inputCheck($_POST['password'])){
						$password = md5($_POST['password']);
					}
					else{
						$passErr = "Enter password";
					}
						
					if($security->checkUser($usermail, $password) == false){
						$loginErr = "Invalid Login!";
					}
					else {
						$loginErr = "Login succesfull!";
					}
				}
					
				?>
				
                <div class="frame-content login-form">
                    <form action="" method="POST">
                        <ul class="login-container"> <!-- enter here login error -->
                            <li class="login-item"><label for="usermail">E-mail:</label><span><?php echo $loginErr?></span></li>
                            <li class="login-item"><input type="text" name="usermail" placeholder="Email..." maxlength="40"><span class="error"><?php echo $nameErr?></span></li>
                            <li class="login-item"><label for="usermail">Password:</label></li>
                            <li class="login-item"><input type="password" name="password" placeholder="Pasword..." maxlength="30"><span class="error"><?php echo $passErr?></span></li>
                            <li class="login-item"><span class="login-dialogue">Do you want to stay logged in ?</span><input type="checkbox" name="stayLoggedin" value="true"></li>
                            <li class="login-item"><a href="?page=forgottenPass">Forgot your password ?</a></li>
                            <li class="login-item"><a href="?page=registration">Not registered yet ?</a></li>
                            <li class="login-item"><input type="submit" value="Log in"></li>
                        </ul>
                    </form>
                </div>

            </div>
            <!-- ENDING OF LOGIN FORM -->

            <!-- BEGGINING OF EMBEDED VIDEO -->
            <div class="frame-container embeded-video">

                <div class="frame-titlebar">
                    <span class="frame-title">Video</span>
                </div>

                <div class="frame-content">
                    <iframe width="220" height="220" src="https://www.youtube.com/embed/DvOldr9Cjc8" frameborder="0" allowfullscreen></iframe>
                </div>

            </div>
            <!-- ENDING OF EMBEDED VIDEO -->

        </aside>
        <!-- ENDING OF SIDE PANEL -->

        <!-- BEGGINING OF MAIN CONTENT -->
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
                    include ("pages/main-page.php");
                }
                else if($page == "registration")
                {
                    include ("pages/registration.php");
                }
            ?>

        </main>
        <!-- ENDING OF MAIN CONTENT -->

    </div>
    <!-- ENDING OF THE PAGE CONTENT-->

    <!-- BEGGINING OF THE PAGE FOOOTER-->
    <footer id="main-footer">
        <div id="footer-nav">
            <a href="#" class="faq-help-button">FAQ</a>
            <span>/</span>
            <a href="#" class="faq-help-button">Help</a>
            <a href="https://www.facebook.com/GYMBOSAK/?fref=ts" id="fb"></a>
        </div>
        <div id="copyright">
            <span>Copyright &#169; 2015 Project X Inc. All Rights Reserved. User Agreement, Privacy and Cookies.</span>
        </div>
    </footer>
    <!-- ENDING OF THE PAGE FOOTER-->

</div>
<!-- ENDING OF THE PAGE-->

</body>
</html>
