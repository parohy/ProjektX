<?php

include_once (ROOT.'API/UserHandler.php');
include_once (ROOT.'API/InputRecheck.php');

if(isset($_SESSION['editId'])){
	$editUser = User::editUser($_SESSION['editId']);
	$check = new Recheck();
	
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
	//mobile
	
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
	header('Location: ../newDesign/?page=private/pageSettings&settings=users');
	exit();
}
