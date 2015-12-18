<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 17:33
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/newDesign/';
include_once ($path.'config.php');
include (ROOT . 'controllers/admin/UserEditorController.php');


$userEditor = new UserEditorController();

$users = $userEditor->getUsers();

$max = count($users);
echo $max;
if($max > 5){
	$userEditor->displayUsers($users,1,3);
}
else{
	$userEditor->displayUsers($users,1,$max-1);
}


