<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */
session_start();
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
echo count($users),'<br/>';
//echo $users[$count-1]['userid'],$users[$count-1]['email'],$users[$count-1]['name'],$users[$count-1]['surname'],'<br/>';
echo $users[$count-1]['userid']+1,'<br/>';



$check = new Recheck();
echo 'outside','<br/>';

if($_SERVER['REQUEST_METHOD']=='POST'){
	echo 'reg','<br/>';
	$name = $check->dumpSpecialChars($_POST['name']);
	$surname = $check->dumpSpecialChars($_POST['last-name']);
	$email = $check->dumpSpecialChars($_POST['mail']);
	$password = $check->dumpSpecialChars($_POST['password']);
	
		
	if(errorControl($name, $surname, $email, $password)){
		$user = new User($name, $surname, $email, $password);
		//return to main page and set $_SESSION['register'] to null
	}
}
/*else if($_SERVER['REQUEST_METHOD']=='POST'){
	echo 'log','<br/>';
	$loginEmail = $check->dumpSpecialChars($_POST['name']);
	$loginPassword = $check->dumpSpecialChars($_POST['name']);
	
	if(strlen($loginEmail) <= 40 && strlen($loginPassword) <= 30){
		$login = new Login();
		if($login->checkLogin($loginEmail, $loginPassword)){
			//return to main page LOGGED IN and set $_SESSION['register'] to null
		}
	}
}*/

function errorControl($name, $surname, $email, $password){
	$error = $GLOBALS['check']->checkEmail($email, 40);
	//email
	if($error != true){
		return $error;
	}
	//name
	$error = $GLOBALS['check']->checkInput($name, 20);
	if($error != true){
		return $error;
	}

	//surname
	$error = $GLOBALS['check']->checkInput($surname, 20);
	if($error != true){
		return $error;
	}

	//password
	$error = $GLOBALS['check']->checkInput($password, 30);
	if($error != true){
		return $error;
	}

	return true;
}