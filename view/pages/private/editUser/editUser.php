<?php
/**
 * Created by PhpStorm.
 * User: Tomas Paronai ,Dominik
 * Date: 8. 12. 2015
 * Time: 22:04
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
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

    <fieldset id="edit-profile">
        <legend>EDIT PROFILE</legend>
        <ul>
            <li>

                <input class="edit-input" type="text" name="name" value="<?php if($editUser != NULL) echo $editUser->getData('name');?>" placeholder="NAME">
            </li>

            <li>

                <input class="edit-input" type="text" name="surname" value="<?php if($editUser != NULL) echo $editUser->getData('surname');?>" placeholder="SURNAME">
            </li>

            <li>

                <input class="edit-input" type="email" name="email" value="<?php if($editUser != NULL) echo $editUser->getData('email');?>" placeholder="EMAIL">
            </li>


            <li>

                <input class="edit-input" type="text" name="phone" value="<?php if($editUser != NULL) echo $editUser->getData('phone');?>" placeholder="MOBILE PHONE">
            </li>

            <li>

                <input class="edit-input" type="text" name="address"value="<?php if($editUser != NULL) echo $editUser->getData('address');?>" placeholder="ADRESS">
            </li>

            <li>

                <input class="edit-input"  type="text" name="city"  value="<?php if($editUser != NULL) echo $editUser->getData('city');?>" placeholder="CITY">
            </li>

            <li>

                <input class="edit-input" type="text" name="postcode" value="<?php if($editUser != NULL) echo $editUser->getData('postcode');?>" placeholder="POSTCODE">
            </li>
			<?php
				if(isset($_SESSION['userrole']) && $_SESSION['userrole'] == 1 ){
					echo '<li>';
						echo 'Type password to continue:<span id="pass-err"></span>';
					echo '</li>';
					echo '<li>';
						echo '<input class="edit-input" type="password" name="password" placeholder="PASSWORD">';
					echo '</li>';
				}
			?>
            <li>
                <input id="edit-profile-submit" type="submit" value="SAVE CHANGE">
            </li>
        </ul>
    </fieldset>
</form>
