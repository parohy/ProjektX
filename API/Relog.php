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
	
	//echo "Mail: ",$check->checkEmail($email, 50);
	if(errorControl($name, $surname, $email, $password)){
		/*handle for saving user information into the database*/
		//$user = new User($name, $surname, $email, $password);
		$user = User::newUser($name, $surname, $email, $password);
		
		$_SESSION['registerErr'] = $user->isSaved();
	}
	//header('Location:  ../index.php');
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
/*###############################*/
/*Executes admin login algorithm*/
else if($_GET['register'] == 'admin'){
	$login = Login::adminLogin();
	$email = $check->dumpSpecialChars($_POST['usermail']);
	$password = $check->dumpSpecialChars($_POST['password']);
	if($check->checkInput($email, 20) && $check->checkInput($password, 20) && $login->checkLogin($email, $password)){
		header('Location: ../pages/adminPage.php');	
	}
	else{
		header('Location: ../web-control.php');
	}
}
/*###############################*/
/*Executes edit algorithm*/
else if($_GET['register'] == 'edit'){
	$editUser = User::editUser($_GET['id']);
	if(isset($_POST['passwordorg']) && $_POST['passwordorg'] == $editUser->getData('password')){	
	
		if(isset($_POST['name'])){
			$value = $check->dumpSpecialChars($_POST['name']);
			if($check->checkInput($_POST['name'],50)){
				$editUser->saveData('name', ucfirst($value));
			}		
		}
		if(isset($_POST['surname'])){
			$value = $check->dumpSpecialChars($_POST['surname']);
			if($check->checkInput($_POST['surname'],50)){
				$editUser->saveData('surname', ucfirst($value));
			}
		}
		if(isset($_POST['mail'])){
			$value = $check->dumpSpecialChars($_POST['mail']);
			if($check->checkEmail($value,50)===false || !is_bool($check->checkEmail($value,50))){
				//todo error
			}
			else{
				$editUser->saveData('email', $value);
			}
		
		}
		if(isset($_POST['address'])){
			$value = $check->dumpSpecialChars($_POST['address']);
			if($check->checkInput($_POST['address'],50)){
				$editUser->saveData('address', ucfirst($value));
			}
		}
		if(isset($_POST['city'])){
			$value = $check->dumpSpecialChars($_POST['city']);
			if($check->checkInput($_POST['city'],50)){
				$editUser->saveData('city', ucfirst($value));
			}
		}
		if(isset($_POST['postcode'])){
			$value = $check->dumpSpecialChars($_POST['postcode']);
			if($check->checkInput($_POST['postcode'],50)){
				$editUser->saveData('postcode', $value);
			}
		}
		
		$_SESSION['editErr'] = "Saved.";
		header('Location: ../index.php');
	}
	else{
		$_SESSION['editErr'] = "Wrong password.";
	}
}

	

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
