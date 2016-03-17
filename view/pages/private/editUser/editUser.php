<?php
/**
 * Created by PhpStorm.
 * User: Tomas Paronai ,Dominik
 * Date: 8. 12. 2015
 * Time: 22:04
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path.'API/UserHandler.php');

$scriptPath = '?page=private/pageSettings&settings=editUser/newUserScript';
$editUser = NULL;
if(isset($_GET['userid'])){
	$editUser = User::editUser($_GET['userid']);
	$_SESSION['editId'] = $editUser->getId();
	$scriptPath = '?page=private/pageSettings&settings=editUser/editScript';
}

else if(isset($_SESSION['userrole']) && $_SESSION['userrole'] == 1 ){
	$editUser = User::editUser($_SESSION['userid']);
	$_SESSION['editId'] = $editUser->getId();
	$scriptPath = '?page=accountSettings&profile=editScript';
}
// DO EDIT USER ?>
<link rel="stylesheet" href="libraries/css/editUser.css">

<form id="profile" action="<?php echo $scriptPath;?>" method="POST" data-ajax="false">

    <div id="edit-profile">
        <ul>
            <li>
                <div class="inputName">Name: </div>
                <input class="input" type="text" name="name" value="<?php if($editUser != NULL) echo $editUser->getData('name');?>" placeholder="NAME">
            </li>

            <li>
                <div class="inputName">Surname: </div>
                <input class="input" type="text" name="surname" value="<?php if($editUser != NULL) echo $editUser->getData('surname');?>" placeholder="SURNAME">
            </li>

            <li>
                <div class="inputName">E-mail: </div>
                <input class="input" type="email" name="email" value="<?php if($editUser != NULL) echo $editUser->getData('email');?>" placeholder="EMAIL">
            </li>


            <li>
                <div class="inputName">Phone: </div>
                <input class="input" type="text" name="phone" value="<?php if($editUser != NULL) echo $editUser->getData('phone');?>" placeholder="MOBILE PHONE">
            </li>

            <li>
                <div class="inputName">Address: </div>
                <input class="input" type="text" name="address"value="<?php if($editUser != NULL) echo $editUser->getData('address');?>" placeholder="ADDRESS">
            </li>

            <li>
                <div class="inputName">City: </div>
                <input class="input"  type="text" name="city"  value="<?php if($editUser != NULL) echo $editUser->getData('city');?>" placeholder="CITY">
            </li>

            <li>
                <div class="inputName">Postcode: </div>
                <input class="input" type="text" name="postcode" value="<?php if($editUser != NULL) echo $editUser->getData('postcode');?>" placeholder="POSTCODE">
            </li>
			<?php
				if(isset($_SESSION['userrole']) && $_SESSION['userrole'] == 1 ){
					echo '<li>';
						echo '<span id="pass-err">Type password to continue:</span>';
					echo '</li>';
					echo '<li>';
						echo '<input class="password input" type="password" name="password" placeholder="PASSWORD">';
					echo '</li>';
				}
			?>
            <li>
                <input class="submit-button" type="submit" value="SAVE CHANGE">
            </li>
        </ul>
    </div>
</form>
