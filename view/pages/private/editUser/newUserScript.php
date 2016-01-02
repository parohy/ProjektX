<?php
/**
 * Created by Eclipse.
 * User: Tomas Paronai
 * Date: 16. 12. 2015
 * Time: 11:21
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/InputRecheck.php');
include_once ($path.'API/UserHandler.php');

$name = $surname = $email = $password = "";
$check = new Recheck();

if(isset($_POST['name'])){
	$name = $check->dumpSpecialChars($_POST['name']); 
}

if(isset($_POST['surename'])){
	$surname = $check->dumpSpecialChars($_POST['surename']);
}

if(isset($_POST['mail'])){
	$email = $check->dumpSpecialChars($_POST['mail']);
}

if($name != "" && $surname != "" && $email != ""){
	$newUser = User::newForceUser($name, $surname, $email);
	if($newUser->isSaved()){
		$_SESSION['editErr'] = "Saved.";
		header('Location: ../newDesign/?page=private/pageSettings&settings=users');
		
	}
	else{
		$_SESSION['editErr'] = "Error saving.";
		header('Location: ../newDesign/?page=private/pageSettings&settings=editUser/editUser');
	}
	exit();
}
	
	