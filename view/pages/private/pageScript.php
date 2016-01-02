<?php

$userEditor = new UserEditorController();

$users = $userEditor->getUsers();
$max = count($users);
$current = $_GET['current'];

if($current != 1){
	$current = $current*5 + 1;
	$max = $current + 5;
}

echo $max;
if($max > 5){
	$userEditor->displayUsers($users,$current,$max-1);
}
else{
	$userEditor->displayUsers($users,1,$max-1);
}