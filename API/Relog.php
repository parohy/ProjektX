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
include_once ('../API/UserHandler.php');
include_once ('../API/Login.php');
include_once ('../API/Database.php');

$tempDB = new DBHandler();
$tempDB->query('SELECT * FROM users');

$users = array();
$users = $tempDB->resultSet();
$count = count($users);

$check = new Recheck();

/*if($_GET['register']=='true'){
	$_GET['register']=true;
}
else if($_GET['register']=='false'){
	$_GET['register']=false;
}*/
	
/*Executes registration algorithm*/
if($_GET['register'] == 'registration'){
	$name = $check->dumpSpecialChars($_POST['name']);
	$surname = $check->dumpSpecialChars($_POST['last-name']);
	$email = $check->dumpSpecialChars($_POST['mail']);
	$password = $check->dumpSpecialChars($_POST['password']);
	
	
	if(errorControl($name, $surname, $email, $password)){
		/*handle for saving user information into the database*/
		//$user = new User($name, $surname, $email, $password);
		$user = User::newUser($name, $surname, $email, $password);
		
		$_SESSION['registerErr'] = $user->isSaved();
		header('Location:  ../index.php');
	}
}
/*###############################*/
/*Executes login algorithm*/
else if($_GET['register'] == 'login'){
	$loginEmail = $check->dumpSpecialChars($_POST['usermail']);
	$loginPassword = $check->dumpSpecialChars($_POST['password']);
	
	if(strlen($loginEmail) <= 40 && strlen($loginPassword) <= 30){
		/*handle for checking user login information with the database*/
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

else if($_GET['register'] == 'edit'){
	$editUser = User::editUser($_GET['id']);
	if(isset($_POST['name'])){
		$value = $check->dumpSpecialChars($_POST['name']);
		$editUser->saveData('name', $value);
	}
	if(isset($_POST['surname'])){
		$value = $check->dumpSpecialChars($_POST['surname']);
		$editUser->saveData('surname', $value);
	}
	if(isset($_POST['mail'])){
		$value = $check->dumpSpecialChars($_POST['mail']);
		if(!$GLOBALS['check']->checkEmail($value,40)){
			//todo error
		}
		else{
			$editUser->saveData('email', $value);
		}
		
	}
	if(isset($_POST['address'])){
		$value = $check->dumpSpecialChars($_POST['address']);
		$editUser->saveData('address', $value);
	}
	if(isset($_POST['city'])){
		$value = $check->dumpSpecialChars($_POST['city']);
		$editUser->saveData('city', $value);
	}
	if(isset($_POST['postcode'])){
		$value = $check->dumpSpecialChars($_POST['postcode']);
		$editUser->saveData('postcode', $value);
	}
	
	header('Location: ../index.php');
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