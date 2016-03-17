<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 10. 2. 2016
 * Time: 10:48
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path.'API/UserHandler.php');

if(isset($_GET['userid'])) {
    $userid = $_GET['userid'];
}
else {
    die("Hoops something went wrong!");
}
?>
<link rel="stylesheet" type="text/css" href="libraries/css/reg-acc.css">
<div class="recover-container">
    <form class="form" action="controllers/recoverPasswordController.php?userid=<?php echo $userid;?>" method="POST">
        <ul>
            <li><div class="inputName">New password: </div><input class="input" type="password" placeholder="New password" name="new-password" id="pass1"> </li>
            <li><div class="inputName">Repeat password: </div><input class="input" type="password" placeholder="Repeat password" name="repeat-password" id="pass2"> </li>
            <li><input type="submit" class="submit-button" value="Confirm"></li>
        </ul>
    </form>
</div>
