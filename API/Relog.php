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

$check = new Recheck();

if($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['register'] == true){
	$name = $check->dumpSpecialChars($_POST['name']);
	$surname = $check->dumpSpecialChars($_POST['surname']);
	$email = $check->dumpSpecialChars($_POST['email']);
	$password = $check->dumpSpecialChars($_POST['password']);
	$address = $check->dumpSpecialChars($_POST['address']);
	$city = $check->dumpSpecialChars($_POST['city']);
	$postcode = $check->dumpSpecialChars($_POST['postcode']);
	
		
	if(errorControl($name, $surname, $email, $password, $address, $city, $postcode)){
		$user = new User($name, $surname, $email, $password, $address, $city, $postcode);
		//return to main page and set $_SESSION['register'] to null
	}
}
else if($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['register'] == false){
	$loginEmail = $check->dumpSpecialChars($_POST['name']);
	$loginPassword = $check->dumpSpecialChars($_POST['name']);
	
	if(strlen($loginEmail) <= 40 && strlen($loginPassword) <= 30){
		$login = new Login();
		if($login->checkLogin($loginEmail, $loginPassword)){
			//return to main page LOGGED IN and set $_SESSION['register'] to null
		}
	}
}

function errorControl($name, $surname, $email, $password, $address, $city, $postcode){
	$error = $check->checkEmail($email, 40);
	//email
	if($error != true){
		return $error;
	}
	//name
	$error = $check->checkInput($name, 20);
	if($error != true){
		return $error;
	}

	//surname
	$error = $check->checkInput($surname, 20);
	if($error != true){
		return $error;
	}

	//password
	$error = $check->checkInput($password, 30);
	if($error != true){
		return $error;
	}

	//address
	$error = $check->checkInput($address, 30);
	if($error != true){
		return $error;
	}

	//city
	$error = $check->checkInput($city, 20);
	if($error != true){
		return $error;
	}

	//postcode
	$error = $check->checkInput($postcode, 5);
	if($error != true){
		return $error;
	}

	return true;
}