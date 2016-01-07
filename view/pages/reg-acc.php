
<?php
/**
 * Created by PhpStorm.
 * User: Dominik Kolesar
 * Date: 5. 12. 2015
 */

$name = $surname = $email = "";
if(isset($_GET['name'])){
	$name = $_GET['name'];
}

if(isset($_GET['surname'])){
	$surname = $_GET['surname'];
}

if(isset($_GET['email'])){
	$email = $_GET['email'];
}	
?>

<link rel="stylesheet" type="text/css" href="libraries/css/reg-acc.css">






<!--<link rel="stylesheet" href="tab2.css">-->

<div id="tab">
   <!--   <div class="title-page">
        <span>ACCOUNT SETTINGS</span>
    </div> -->
    <div id="formulars"class="group">
        <div id="menu-content">
            <ul id="menu">
                <li id="regtab1" class="tabselect" onclick="location.href = '#tab1';"><a>Registration</a></li>
                <li class="tabselect" onclick="location.href = '#tab2';"><a>Recover password</a></li>
            </ul>
        </div>

        <div id="all-tab">
            <div id="tab1" class="tab-content">

                <form class="form" action='API/Relog.php?register=registration' method="POST">
                    <ul>
                        <li><input class="input" type="text" placeholder="name" name="name" value="<?php echo $name;?>"> </li>
                        <li><input class="input" type="text" placeholder="surname" name="last-name" value="<?php echo $surname;?>"> </li>
                        <li><input class="input" type="email" placeholder="email" name="mail" value="<?php echo $email;?>"> </li>
                        <li><input class="input" type="password" placeholder="password" name="password"></li>
                        <li><input type="submit" class="submit-button" value="REGISTER"></li>
                    </ul>
                </form>
            </div>

            <div id="tab2" class="tab-content">

                <form class="form" action="" method="POST">
                    <ul>
                        <li><input class="input" type="email" placeholder="email" name="name"> </li>
                        <li><input type="submit" class="submit-button" value="RECOVER"></li>
                    </ul>
                </form>

            </div>
        </div>
    </div>
</div>
