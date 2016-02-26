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
		echo '<li class="view"><div class="inputName">Name:</div><div class="edit-input">'.$user->getData('name').'</div></li>';
		echo '<li class="view"><div class="inputName">Surname:</div><div class="edit-input">'.$user->getData('surname').'</div></li>';
		echo '<li class="view"><div class="inputName">Email:</div><div class="edit-input">'.$user->getData('email').'</div></li>';
		echo '<li class="view"><div class="inputName">Phone:</div><div class="edit-input">'.$user->getData('phone').'</div></li>';
		echo '<li class="view"><div class="inputName">Street:</div><div class="edit-input">'.$user->getData('address').'</div></li>';
		echo '<li class="view"><div class="inputName">City:</div><div class="edit-input">'.$user->getData('city').'</div></li>';
		echo '<li class="view"><div class="inputName">Postcode:</div><div class="edit-input">'.$user->getData('postcode').'</div></li>';
		echo '<li class="view"><div class="inputName">Registered since:</div><div class="edit-input">'.$user->getData('datejoined').'</div></li>';
		echo '<li class="view"><div class="inputName">User role:</div><div class="edit-input">'.$role.'</div></li>';
	echo '</ul>';
	echo '<span class="view"><a class="view-controls" href="?page=private/pageSettings&settings=editUser/editUser&userid=' . $user->getId() . '"><i class="fa fa-pencil-square-o fa-2x"></i></a>';
	if($user->getData('deleted') != 0){
		echo '<a class="view-controls" href="?page=private/pageSettings&settings=editUser/deleteUser&userid=' . $_GET['userid'] . '"><i class="fa fa-refresh fa-2x"></i></a></span>';
	}
	else{
		echo '<a class="view-controls" href="?page=private/pageSettings&settings=editUser/deleteUser&userid=' . $_GET['userid'] . '"><i class="fa fa-times fa-2x"></i></a></span>';
	}

}
else if(isset($_SESSION['userid'])){
	$user = User::editUser($_SESSION['userid']);
	if($user->getData('role') == '2'){
		$role = "Admin";
	}
	else{
		$role = "User";
	}
	
	echo '<ul class="userView">';
		echo '<li class="view"><div class="inputName">Name:</div><div class="edit-input">'.$user->getData('name').'</div></li>';
		echo '<li class="view"><div class="inputName">Surname:</div><div class="edit-input">'.$user->getData('surname').'</div></li>';
		echo '<li class="view"><div class="inputName">Email:</div><div class="edit-input">'.$user->getData('email').'</div></li>';
		echo '<li class="view"><div class="inputName">Phone:</div><div class="edit-input">'.$user->getData('phone').'</div></li>';
		echo '<li class="view"><div class="inputName">Street:</div><div class="edit-input">'.$user->getData('address').'</div></li>';
		echo '<li class="view"><div class="inputName">City:</div><div class="edit-input">'.$user->getData('city').'</div></li>';
		echo '<li class="view"><div class="inputName">Postcode:</div><div class="edit-input">'.$user->getData('postcode').'</div></li>';
		echo '<li class="view"><div class="inputName">Registered since:</div><div class="edit-input">'.$user->getData('datejoined').'</div></li>';
		echo '<li class="view"><div class="inputName">User role:</div><div class="edit-input">'.$role.'</div></li>';
	echo '</ul>';
}

