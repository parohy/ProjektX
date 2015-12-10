<?php
session_start();
/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once ('InputRecheck.php');
include_once ('UserHandler.php');
include_once ('Login.php');
include_once ('Database.php');

$tempDB = new DBHandler();
$tempDB->query('SELECT * FROM users');

$users = array();
$users = $tempDB->resultSet();
$count = count($users);

$check = new Recheck();
	
/*Executes registration algorithm*/
if($_GET['register'] == 'registration'){
	$_SESSION['registerErr']=false;
	$name = $check->dumpSpecialChars($_POST['name']);
	$surname = $check->dumpSpecialChars($_POST['last-name']);
	$email = $check->dumpSpecialChars($_POST['mail']);
	$password = $check->dumpSpecialChars($_POST['password']);
	
	if(errorControl($name, $surname, $email, $password)){
		/*handle for saving user information into the database*/
		$user = User::newUser($name, $surname, $email, $password);
		
		$_SESSION['registerErr'] = $user->isSaved();
	}
	else{
		$_SESSION['registerErr'] = "Registration failed.";
		header('Location:  ../?page=registration&name='.$name.'&surname='.$surname.'&email='.$email.'');
		exit();
	}
	
	if($_SESSION['registerErr']==true){
		$_SESSION['registerErr'] = "User registered.";
		header('Location:  ../index.php');
		exit();
	}
}
/*###############################*/
/*Executes login algorithm*/
else if($_GET['register'] == 'login'){
	$loginEmail = $check->dumpSpecialChars($_POST['usermail']);
	$loginPassword = $check->dumpSpecialChars($_POST['password']);
	
	if(strlen($loginEmail) <= 50 && strlen($loginPassword) <= 50){
		/*handle for checking user login information with the database*/
		$login = new Login(); 
		
		if($login->checkLogin($loginEmail, $loginPassword)){
			echo "login OK"; //LOGIN PASSED
			$_SESSION['loggedin'] = true;
			$_SESSION['loginErr'] = "Login successful";
			$_SESSION['username'] = $login->getName();
			$_SESSION['userid'] = $login->getUserId();
			header('Location:  ../index.php');
			exit();
		}
		else{
			echo "login bad"; //LOGIN NOT PASSED
			$_SESSION['loggedin'] = false;
			$_SESSION['loginErr'] = "Wrong email and password.";
			header('Location: ../index.php?logmail='.$loginEmail.'');
			exit();
		}
	}
}
/*###############################*/
/*Executes edit algorithm*/
else if($_GET['register'] == 'edit' && isset($_SESSION['userid'])){
	$editUser = User::editUser($_SESSION['userid']);
	if(isset($_POST['passwordorg']) && $_POST['passwordorg'] == $editUser->getData('password')){	
		
		//name
		if(isset($_POST['name'])){
			$value = $check->dumpSpecialChars($_POST['name']);
			if($check->checkInput($_POST['name'],50)){
				$editUser->saveData('name', ucfirst($value));
			}		
		}
		
		//surname
		if(isset($_POST['surname'])){
			$value = $check->dumpSpecialChars($_POST['surname']);
			if($check->checkInput($_POST['surname'],50)){
				$editUser->saveData('surname', ucfirst($value));
			}
		}
		
		//email
		if(isset($_POST['mail'])){
			$value = $check->dumpSpecialChars($_POST['mail']);
			if($check->checkEmail($value,50)===false || !is_bool($check->checkEmail($value,50))){
				//todo error
			}
			else{
				$editUser->saveData('email', $value);
			}
		
		}
		
		//address
		if(isset($_POST['address'])){
			$value = $check->dumpSpecialChars($_POST['address']);
			if($check->checkInput($_POST['address'],50)){
				$editUser->saveData('address', ucfirst($value));
			}
		}
		
		//city
		if(isset($_POST['city'])){
			$value = $check->dumpSpecialChars($_POST['city']);
			if($check->checkInput($_POST['city'],50)){
				$editUser->saveData('city', ucfirst($value));
			}
		}
		
		//postcode
		if(isset($_POST['postcode'])){
			$value = $check->dumpSpecialChars($_POST['postcode']);
			if($check->checkInput($_POST['postcode'],50)){
				$editUser->saveData('postcode', $value);
			}
		}
		
		$_SESSION['editErr'] = "Saved.";
		header('Location: ../?page=editProfile');
	}
	else{
		$_SESSION['editErr'] = "Wrong password.";
	}
}

/**
 * Validates user inputs for registration form.
 * @author Tomas Paronai
 * @param $name
 * @param $surname
 * @param $email
 * @param $password
 * @return - true if all OK
 */

function errorControl($name, $surname, $email, $password){
	$error = $GLOBALS['check']->checkEmail($email, 50);
	//email
	echo $error;
	if(!is_bool($error) || $error == false){
		$_SESSION['registerErr'] = $error;
		return false;
	}
	//name
	$error = $GLOBALS['check']->checkInput($name, 50);
	if(!is_bool($error) || $error == false){
		$_SESSION['registerErr'] = $error;
		return false;
	}

	//surname
	$error = $GLOBALS['check']->checkInput($surname, 50);
	if(!is_bool($error) || $error == false){
		$_SESSION['registerErr'] = $error;
		return false;
	}

	//password
	$error = $GLOBALS['check']->checkInput($password, 50);
	if(!is_bool($error) || $error == false){
		$_SESSION['registerErr'] = $error;
		return false;
	}

	return true;
}
