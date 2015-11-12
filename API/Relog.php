<?php
session_start();
/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

error_reporting(E_ALL);

include_once ('../API/InputRecheck.php');
include_once ('../API/Newuser.php');
include_once ('../API/Login.php');
include_once ('../API/Database.php');

$tempDB = new DBHandler();
$tempDB->query('SELECT * FROM users');

$users = array();
$users = $tempDB->resultSet();
$count = count($users);

$check = new Recheck();
	
if($_SESSION['register'] == "register"){
	$name = $check->dumpSpecialChars($_POST['name']);
	$surname = $check->dumpSpecialChars($_POST['last-name']);
	$email = $check->dumpSpecialChars($_POST['mail']);
	$password = $check->dumpSpecialChars($_POST['password']);
	
	
	if(errorControl($name, $surname, $email, $password)){
		$user = new User($name, $surname, $email, $password);
		$_SESSION['registerErr'] = $user->isSaved();
		header('Location:  ../index.php');
	}
}
else if($_SESSION['register'] == "login"){
	$loginEmail = $check->dumpSpecialChars($_POST['usermail']);
	$loginPassword = $check->dumpSpecialChars($_POST['password']);
	
	if(strlen($loginEmail) <= 40 && strlen($loginPassword) <= 30){
		$login = new Login();
		if($login->checkLogin($loginEmail, $loginPassword)){
			echo "login OK"; //LOGIN PASSED
			$_SESSION['loggedin'] = true;
			$_SESSION['loginErr'] = "Login successful";
			$_SESSION['username'] = $login->getName();
			echo $_SESSION['username'];
			header('Location:  ../index.php');
		}
		else{
			echo "login bad"; //LOGIN NOT PASSED
			$_SESSION['loggedin'] = false;
			$_SESSION['loginErr'] = "Wrong email and password.";
			header('Location: ../index.php');
		}
	}
}

	

function errorControl($name, $surname, $email, $password){
	$error = $GLOBALS['check']->checkEmail($email, 40);
	//email
	if($error != true){
		$_SESSION['registerErr'] = $error;
		return false;
	}
	//name
	$error = $GLOBALS['check']->checkInput($name, 20);
	if($error != true){
		$_SESSION['registerErr'] = $error;
		return false;
	}

	//surname
	$error = $GLOBALS['check']->checkInput($surname, 20);
	if($error != true){
		$_SESSION['registerErr'] = $error;
		return false;
	}

	//password
	$error = $GLOBALS['check']->checkInput($password, 30);
	if($error != true){
		$_SESSION['registerErr'] = $error;
		return false;
	}

	return true;
}