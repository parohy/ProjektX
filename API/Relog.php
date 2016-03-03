<?php
if(isset($_COOKIE['sessionID'])){
	session_id($_COOKIE['sessionID']);
}
else{
	$_COOKIE['sessionID'] = session_id();
}
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
include_once ('Mail.php');

$tempDB = new DBHandler();
$tempDB->query('SELECT * FROM users');

$users = array();
$users = $tempDB->resultSet();
$count = count($users);

$check = new Recheck();
	
/*Executes registration algorithm*/
if($_GET['register'] == 'registration'){

    if(isset($_POST['g-recaptcha-response']))
        $captcha=$_POST['g-recaptcha-response'];

	$_SESSION['registerErr']=false;
	$name = $check->dumpSpecialChars($_POST['name']);
	$surname = $check->dumpSpecialChars($_POST['last-name']);
	$email = $check->dumpSpecialChars($_POST['mail']);
	$password = $check->dumpSpecialChars($_POST['password']);
	
	if(!$captcha){
		$_SESSION['registerErr'] = "Wrong captcha.";		
		header('Location:  ../?page=reg-acc&name='.$name.'&surname='.$surname.'&email='.$email);
		exit();
	}

    $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcphBUTAAAAANmZJWIx-fRUQnmBKsEk_7ITZc5L&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);

    if($response['success'] == false)
    {
        $_SESSION['registerErr'] = "You are spammer ! Get the @$%K out";
        header('Location:  ../?page=reg-acc&name='.$name.'&surname='.$surname.'&email='.$email);
        exit();
    }

	if(errorControl($name, $surname, $email, $password) === true){
		/*handle for saving user information into the database*/
		$user = User::newUser($name, $surname, $email, $password);
		
		$_SESSION['registerErr'] = $user->isSaved();
	}
	else{
		//$_SESSION['registerErr'] = "Registration failed.";
		/*unset($_SESSION['username']);
		unset($_SESSION['loggedin']);
		unset($_SESSION['userid']);
		unset($_SESSION['userrole']);*/
		if(isset($user)){
			unset($user);
		}		
		header('Location:  ../?page=reg-acc&name='.$name.'&surname='.$surname.'&email='.$email);
		exit();
	}
	
	if($_SESSION['registerErr']==true){
		$_SESSION['registerMsg'] = "User registered.";
		
		/*login after registration
		$_SESSION['loggedin'] = true;
		if(isset($user)) {
            $_SESSION['username'] = $user->getData('name');
            $_SESSION['userid'] = $user->getId();
            $_SESSION['userrole'] = $user->getData('role');
        }*/

        $mail = new Mail();
        $mail->addRecipient($email);

        $htmMail = '<h1>Welcome you are one step away from becoming full user</h1>
        <p>
        Click this link for your account activation <a href="http://www.cassomedia.sk/controllers/activate.php?user='.$user->getId().'">http://www.cassomedia.sk/controllers/activate.php?user='.$user->getId().'</a>
        </p>';

        $mail->composeMail("Activation",$htmMail,"
        Welcome you are one step away from becoming full user
        Visit this link for your account activation http://www.cassomedia.sk/controllers/activate.php?user=".$user->getId().
            "");

        $mailResponse = $mail->sendMail();
        if($mailResponse != "success") {
            die("HOOOPS EMAIL NOT SENT ".$mailResponse);
        }
        else {
            header('Location:  ../?page=activate');
            exit();
        }

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
		
		if($login->checkLogin($loginEmail, $loginPassword) === 1){
			echo "login OK"; //LOGIN PASSED
			$_SESSION['loggedin'] = time();
			$_SESSION['loginMsg'] = "Login successful";
			$_SESSION['username'] = $login->getName();
			$_SESSION['userid'] = $login->getUserId();
			header('Location:  ../index.php');
			exit();
		}
        else if($login->checkLogin($loginEmail, $loginPassword) === 2){
            echo "login bad"; //LOGIN NOT PASSED
            //$_SESSION['loggedin'] = false;
            $_SESSION['loginErr'] = "Activate your account";
            header('Location: ../index.php');
            exit();
        }
		else if($login->checkLogin($loginEmail, $loginPassword) === 3){
			echo "login bad"; //LOGIN NOT PASSED
			//$_SESSION['loggedin'] = false;
			$_SESSION['loginErr'] = "Wrong email or password.";
			header('Location: ../index.php');
			exit();
		}
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
