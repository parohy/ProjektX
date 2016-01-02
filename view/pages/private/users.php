<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 17:33
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path . 'controllers/admin/UserEditorController.php');


$userEditor = new UserEditorController();

$users = $userEditor->getUsers();
$max = count($users);
$from = 1;

if($max > 5){
	$max = 6;
}

if(isset($_GET['to'])){
	$max = $_GET['to'];
}

if(isset($_GET['from'])){
	$from = $_GET['from'];
}


$userEditor->displayUsers($users,$from,$max-1);

/*if($max > 5){
	$userEditor->displayUsers($users,$current,$max-1);
}
else{
	$userEditor->displayUsers($users,1,$max-1);
}*/


