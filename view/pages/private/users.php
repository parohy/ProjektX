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
$pagination = 1;
$display = 5;

if(isset($_GET['display'])){
	$display = $_GET['display'];
}

if(isset($_GET['pagination'])){
	$pagination = $_GET['pagination'];
}

$userEditor->displayUsers($users, $pagination, $display);

/*if($max > 5){
	$userEditor->displayUsers($users,$current,$max-1);
}
else{
	$userEditor->displayUsers($users,1,$max-1);
}*/


