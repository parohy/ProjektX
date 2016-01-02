<?php
/**
 * Created by Eclipse.
 * User: Tomas Paronai
 * Date: 8. 12. 2015
 * Time: 22:04
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/UserHandler.php');


$editUser;
if(isset($_GET['userid'])){
	$editUser = User::editUser($_GET['userid']);
	$editUser->delete();
	header('Location: ../newDesign/?page=private/pageSettings&settings=users');
	exit();
}