<?php
if(isset($_COOKIE['sessionID'])){
    session_id($_COOKIE['sessionID']);
}
else{
    $_COOKIE['sessionID'] = session_id();
}
session_start();
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 2/19/2016
 * Time: 12:40 PM
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';


include_once($path.'API/SearchModel.php');
include_once($path.'API/InputRecheck.php');

$search = new SearchModel();
$prepare = new Recheck();

$term = array();
$i = 0;
$set = false;

if(isset($_POST['name']) && strlen($_POST['name']) > 0){
    $term['name'] = $prepare->dumpSpecialChars($_POST['name']);
    $set = true;
}
if(isset($_POST['surname']) && strlen($_POST['surname']) > 0){
    $term['surname'] =  $prepare->dumpSpecialChars($_POST['surname']);
    $set = true;
}
if(isset($_POST['email']) && strlen($_POST['email']) > 0 && $_GET['settings'] != 'products'){
    $term['email'] = $prepare->dumpSpecialChars($_POST['email']);
    $set = true;
}
if(isset($_POST['id']) && strlen($_POST['id']) > 0){
    $term['id'] = $prepare->dumpSpecialChars($_POST['id']);
    $set = true;
}
$result = null;

if(isset($_GET['settings'])){
    if($_GET['settings'] == 'orders' && $set){
        $result = $search->getSpecificResults('orders',$term);
    }
    else if($_GET['settings'] == 'users' && $set){
        $result = $search->getSpecificResults('users',$term);
    }
    else if($_GET['settings'] == 'products' && $set){
        $result = $search->getSpecificResults('products',$term);
    }
}

$_SESSION['searchRes'] = $result;
header('Location: ' . $_SERVER['HTTP_REFERER']);

