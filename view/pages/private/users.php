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

if(isset($_SESSION['searchRes'])){
	$users = $_SESSION['searchRes'];
    unset($_SESSION['searchRes']);
}
else{
	$users = $userEditor->getUsers();
}

$pagination = 1;
$display = 5;

if(isset($_GET['display'])){
	$display = $_GET['display'];
}

if(isset($_GET['pagination'])){
	$pagination = $_GET['pagination'];
}

$userEditor->displayUsers($users, $pagination, $display);