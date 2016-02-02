<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 2. 2. 2016
 * Time: 23:21
 */
include_once('../API/UserHandler.php');

$user = User::editUser($_GET['user']);
$user->saveData("deleted","1");