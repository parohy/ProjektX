<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 3. 2. 2016
 * Time: 8:38
 */
include_once ('../API/UserHandler.php');

if(isset($_GET['user'])) {
    $user = User::editUser($_GET['user']);
    $user->saveData("activated","1");
    header("Location:/?page=main-page");
}