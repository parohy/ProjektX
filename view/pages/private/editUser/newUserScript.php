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
$newUser = null;
$exitTo = 'Location: ?page=private/pageSettings';

if(isset($_POST['name'])){
	$name = $check->dumpSpecialChars($_POST['name']); 
}

if(isset($_POST['surname'])){
	$surname = $check->dumpSpecialChars($_POST['surname']);
}

if(isset($_POST['email'])){
	$email = $check->dumpSpecialChars($_POST['email']);
}

if($name != "" && $surname != "" && $email != "" && $check->checkEmail($email, 50) === true){
	$newUser = User::newForceUser($name, $surname, $email);
	echo $name . ' ' . $surname . ' ' . $email;
}

if($newUser != null && $newUser->isSaved()){
	$_SESSION['editErr'] = "Saved.";
	$exitTo .= '&settings=users';
}
else{
	$_SESSION['editErr'] = "Name, surname and email is required!";
	$exitTo .= '&settings=editUser/editUser';
}

header($exitTo);
exit();
?>
	