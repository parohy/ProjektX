<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= 'ProjektX/';

	$email = "";
	if(isset($_GET['logmail'])){
		$email = $_GET['logmail'];
	}

    $logMsg = "";
    if(isset($_SESSION['loginErr'])){
        $logMsg = $_SESSION['loginErr'];
    }

    if(isset($_SESSION['registerErr']) && !isset($_SESSION['loginErr']) && !isset($_GET['page'])){
        $logMsg = $_SESSION['registerErr'];
        unset($_SESSION['registerErr']);
    }
    unset($_SESSION['loginErr']);

?>
<div class="greenBar"><?php echo '<div class="headerErrorMessage"><span class="headerMessage">'.$logMsg.'</span></div>'; ?></div>
<div class="group top">
    <div class="welcome">
        <?php
        if(isset($_SESSION['loggedin']) && isset($_SESSION['userrole'])) {
            if($_SESSION['loggedin'] == "true") {
                if($_SESSION['userrole'] == "2") {
                    echo '<span class="welcome-label"><img src="libraries/img/icons/user icon.png"><strong class="welcome-buttons"><a href="?page=private/pageSettings">PAGE SETTINGS</a></strong> / <strong class="welcome-buttons"><a href="?login=false">LOG OUT</a></strong></span>';
                }
                else {
                    echo '<span class="welcome-label"><img src="libraries/img/icons/user icon.png"><strong class="welcome-buttons"><a href="?page=accountSettings">ACCOUNT SETTINGS</a></strong> / <strong class="welcome-buttons"><a href="?login=false">LOG OUT</a></strong></span>';
                }
            } else {
                echo '<span class="welcome-label"><img src="libraries/img/icons/user icon.png">WELCOME USER, YOU CAN <strong class="welcome-buttons"><a href="#" id="login">LOGIN</a></strong> OR <strong class="welcome-buttons"><a href="?page=reg-acc">REGISTER</a></strong></span>';
            }
        }
        else {
            echo '<span class="welcome-label"><img src="libraries/img/icons/user icon.png">WELCOME USER, YOU CAN <strong class="welcome-buttons"><a href="#" id="login">LOGIN</a></strong> OR <strong class="welcome-buttons"><a href="?page=reg-acc">REGISTER</a></strong></span>';
        }
        ?>
        <!--<div class="headerErrorMessage">
            <span class="headerMessage"></span>
        </div>-->
        <div class="login-frame">
            <form action="API/Relog.php?register=login" method="POST">
                <ul>
                    <li><input type="email" name="usermail" placeholder="email@email.com" required></li>
                    <li><input type="password" name="password" placeholder="password" required></li>
                    <li><input type="submit" value="Login"></li>
                    <li class="forgotpass"><a href="?page=private/editUser/passRecover&password=recover">Forgot password?</a></li>
                </ul>
            </form>
        </div>
    </div>

    <a class="title" href="?page=main-page">
        <img class="viatechlogo" src="libraries/img/header/logo.png" width="360px" height="62px">
    </a>
    
    <div class="search">
        
    	<?php
    	if((isset($_SESSION['userrole']) && $_SESSION['userrole'] != "2") || !isset($_SESSION['username'])){
    		echo '<img class="shopicon" src="libraries/img/icons/cart-icon.png">';
    		echo '<div class="cart">
            <div class="cart-title" href="?page=cart">
                <ul>
                    <li>
                        <a href="?page=cart" class="cartbutton">SHOPPING CART: </a><span class="amount">';
                            
                            if(isset($_SESSION['cart'])) {
                                $cartContent = $_SESSION['cart'];
                                $totalCost = 0;

                                foreach($cartContent as $cart) {
                                    $temp = floatval($cart['price']);
                                    $temp *= $cart['count'];
                                    $totalCost += $temp;
                                }

                                echo $totalCost;
                            } else {
                                echo "0";
                            }
                            
             echo        ' </span><a class="euro">&#8364;</a>
                    </li>
                </ul>
            </div>
        </div>';
    	}
        else{
          echo '<p class="replace-header">';
        }
    	?>
        
        <form action="controllers/searchController.php" method="GET" id="searchForm">
           <div class="group search-bar">
               <input type="search" name="search" placeholder="SEARCH" id="search" list="suggestions">
               <img class="lupa" src="libraries/img/icons/search-icon.png" onClick="document.forms['searchForm'].submit();">
           </div>
            <datalist id="suggestions"></datalist>
            <script src="libraries/js/searchScript.js"></script>
        </form>
    </div>
</div>
<div class="bottom">
<?php
include_once ($path.'view/includes/navigation.php');
?>
</div>