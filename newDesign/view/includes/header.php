<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

	$email = "";
	if(isset($_GET['logmail'])){
		$email = $_GET['logmail'];
	}
?>
<div class="top">
    <div class="welcome">
        <?php
        if(isset($_SESSION['loggedin'])) {
            if($_SESSION['loggedin'] == "true") {
                if($_SESSION['username'] == "admin") {
                    echo '<span class="welcome-label"><img src="libraries/img/icons/user icon.png"><strong class="welcome-buttons"><a href="?page=private/pageSettings">PAGE SETTINGS</a></strong> / <strong class="welcome-buttons"><a href="?login=false">LOG OUT</a></strong></span>';
                }
                else {
                    echo '<span class="welcome-label"><img src="libraries/img/icons/user icon.png"><strong class="welcome-buttons"><a href="?page=accountSettings">ACCOUNT SETTINGS</a></strong> / <strong class="welcome-buttons"><a href="?login=false">LOG OUT</a></strong></span>';
                }
            }
        }
        else {
            echo '<span class="welcome-label"><img src="libraries/img/icons/user icon.png">WELCOME USER YOU CAN <strong class="welcome-buttons"><a href="#" id="login">LOGIN</a></strong> OR <strong class="welcome-buttons"><a href="?page=reg-acc">REGISTER</a></strong></span>';
        }
        ?>

        <div class="login-frame">
            <form action="API/Relog.php?register=login" method="POST">
                <ul>
                    <li><input type="email" name="usermail" placeholder="email@email.com" required></li>
                    <li><input type="password" name="password" placeholder="password" required></li>
                    <li><a href="?page=forgottenPass">Forgot your password ?</a></li>
                    <li><input type="submit" value="Login"></li>
                </ul>
            </form>
        </div>
    </div>

    <div class="title">
        <h1><a href="?page=main-page">VIATECH</a></h1>
    </div>

    <div class="search">
        <div class="cart">
            <div class="cart-icon">
                <img src="libraries/img/icons/cart-icon.png">
            </div>
            <div class="cart-title">
                <a href="?page=cart">SHOPPING CART :</a><span class="amount">0.00 EUR</span>
            </div>
        </div>
        <br>
        <form action="controllers/searchController.php" method="GET" id="searchForm">
            <input type="search" name="search" placeholder="SEARCH" id="search">
        </form>
    </div>

    <?php
    include_once (ROOT.'view/includes/navigation.php');
    ?>
</div>
