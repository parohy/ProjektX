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
include_once ($path.'API/Mail.php');

$name = $surname = $email = $password = "";
$check = new Recheck();
$newUser = null;
$exitTo = '?page=private/pageSettings';

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
	//echo $name . ' ' . $surname . ' ' . $email;
}

if($newUser != null && $newUser->isSaved()){
	$_SESSION['adminMsg'] = "User created.";
	$exitTo .= '&settings=users&display=20&pagination=1';

	$mail = new Mail();
	$mail->addRecipient($email);
	$body = '<h2>Account created by admin.</h2><ul><li>Login: '.$email.'</li><li>Password: '.$newUser->getGenPassword().'</li></ul>';
	$mail->composeMail('Registration',$body,'Visit this link for your account activation http://www.cassomedia.sk/controllers/activate.php?user='.$newUser->getId().'');
	$mailResponse = $mail->sendMail();
	if($mailResponse != "success") {
		die("HOOOPS EMAIL NOT SENT ".$mailResponse);
	}
	else{
		$_SESSION['adminMsg'] = 'Email send success!';
	}
}
else{
	$_SESSION['adminMsg'] = "Name, surname and email is required!";
	$exitTo .= '&settings=editUser/editUser';
}

//header($exitTo);
//exit();
if(headers_sent()){
    die('Request has been processed. Please click on <a href="'.$exitTo.'">this</a> to go back.');
}
else{
    exit(header('Location: ' . $exitTo));
}
?>
	