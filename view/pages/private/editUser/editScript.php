<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/UserHandler.php');
include_once ($path.'API/InputRecheck.php');

$exitTo = '?page=';
$editUser = null;
$check = new Recheck();
if(isset($_SESSION['editId'])){
	$editUser = User::editUser($_SESSION['editId']);
}

if(isset($_SESSION['userrole']) && $_SESSION['userrole'] == 1){
	$exitTo .= 'accountSettings';	
	if(isset($_POST['password'])){
		$value = $check->dumpSpecialChars($_POST['password']);		
		if($check->checkInput($value, 50) && $editUser->getData('password') == $value && $editUser != null){
			proceed($check,$editUser);
		}
		else{
			$_SESSION['editErr'] = "Wrong password.";
			$exitTo .= '&profile=editUser';
			exitScript();
		}
	}
}
else{
	$exitTo .= 'private/pageSettings&settings=users';
	proceed($check,$editUser);
}


function proceed($check,$editUser){
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
	if(isset($_POST['email'])){
		$value = $check->dumpSpecialChars($_POST['email']);
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
	
	//password
	if(isset($_POST['new-password'])){
		$value = $check->dumpSpecialChars($_POST['new-password']);
		if($check->checkInput($_POST['new-password'],50)){
			$editUser->saveData('password', $value);
		}
	}
	
	$_SESSION['editErr'] = "Saved.";	
	exitScript();
}

function exitScript(){
	if(headers_sent()){
		die('Redirect failed. Please click on <a href="'.$GLOBALS['exitTo'].'">this</a> to try again.');
	}
	else{
		exit(header('Location: ' . $GLOBALS['exitTo']));
	}
}