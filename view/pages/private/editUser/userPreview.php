<?php
/**
 * Created by Eclipse.
 * User: Tomas Paronai
 * Date: 8. 12. 2015
 * Time: 22:04
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/UserHandler.php');

if(isset($_GET['userid'])){
	$user = User::editUser($_GET['userid']);
	if($user->getData('role') == '2'){
		$role = "Admin";
	}
	else{
		$role = "User";
	}
	
	echo '<ul class="userView">';
		echo '<li class="view"><b>Name:</b> '.$user->getData('name').'</li>';
		echo '<li class="view"><b>Surname:</b> '.$user->getData('surname').'</li>';
		echo '<li class="view"><b>Email:</b> '.$user->getData('email').'</li>';
		echo '<li class="view"><b>Street:</b> '.$user->getData('address').'</li>';
		echo '<li class="view"><b>City:</b> '.$user->getData('city').'</li>';
		echo '<li class="view"><b>Postcode:</b> '.$user->getData('postcode').'</li>';
		echo '<li class="view"><b>Registered since:</b> '.$user->getData('datejoined').'</li>';
		echo '<li class="view"><b>User role:</b> '.$role.'</li>';
	echo '</ul>';
	echo '<span class="view"><a class="view-controls" href="?page=private/pageSettings&settings=editUser/editUser&userid=' . $user->getId() . '">Edit</a>
			                          <a class="view-controls" href="?page=private/pageSettings&settings=editUser/deleteUser&userid=' . $user->getId() . '">Delete</a></span>';
}

