<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Matúš
 * Date: 8. 11. 2015
 * Time: 22:43
 */

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $_SESSION['search'] = $search;
}

header('Location: ../?page=searchResults');