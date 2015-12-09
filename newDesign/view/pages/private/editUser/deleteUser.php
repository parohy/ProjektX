<?php

include_once (ROOT.'API/UserHandler.php');


$editUser;
if(isset($_GET['userid'])){
	$editUser = User::editUser($_GET['userid']);
	$editUser->delete();
	header('Location: ../newDesign/?page=private/pageSettings&settings=users');
	exit();
}