<?php
/**
 * Created by PhpStorm.
 * User: Tomas Paronai
 * Date: 15. 1. 2016
 * Time: 10:24
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/UserHandler.php');

if($_SESSION['userid']){
	$user = User::editUser($_SESSION['userid']);
}
else{
	die();
}
?>

<link rel="stylesheet" type="text/css" href="libraries/css/admin-panel.css">
<aside class="side-nav">
<nav class="admin-nav">
    <ul>
    	<?php if(isset($_GET['profile']) && $_GET['profile']=='editUser') echo '<li><a href="?page=accountSettings&profile=userPreview">Profile</a></li>'; else echo '<li><a href="?page=accountSettings&profile=editUser">Change profile</a></li>'?>
    	<li><a href="">Change password</a></li>        
        <li><a href="">Orders</a></li>
        <li><a href="">Delete account</a></li>
    </ul>
</nav>
</aside>
<div class="admin-panel">
	<?php 
	if(isset($_GET['profile'])){
		$profile = 'view/pages/private/editUser/'.$_GET['profile'].'.php';
	}
	else{
		$profile = 'view/pages/private/editUser/userPreview.php';
	}
		include_once ($profile);
	?>
</div>