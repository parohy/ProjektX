<?php
/**
 * Created by Eclipse.
 * User: Tomas Paronai
 * Date: 8. 12. 2015
 * Time: 22:04
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path.'API/UserHandler.php');


$editUser;
if(isset($_GET['userid'])){
	$editUser = User::editUser($_GET['userid']);
	if($editUser->getData('deleted') == 0){
		$editUser->delete();
        $_SESSION['adminMsg'] = 'User archived.';
	}
	else{
		$editUser->restore();
        $_SESSION['adminMsg'] = 'User restored.';
	}

	//header('Location: ?page=private/pageSettings&settings=users&display=20&pagination=1');
	//exit();

	if(headers_sent()){
		die('Request has been processed. Please click on <a href=?page=private/pageSettings&settings=users&display=20&pagination=1">this</a> to go back.');
	}
	else{
		exit(header('Location: ?page=private/pageSettings&settings=users&display=20&pagination=1'));
	}
}
