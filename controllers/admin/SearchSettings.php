<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 2/19/2016
 * Time: 12:40 PM
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
$exitTo = '?page=pageSettings';

include_once($path.'API/SearchModel.php');
include_once($path.'API/InputRecheck.php');

$search = new SearchModel();
$prepare = new Recheck();

$term = array();
$i = 0;

if(isset($_POST['name']) && strlen($_POST['name']) > 0){
    $term['name'] = $prepare->dumpSpecialChars($_POST['name']);
}
if(isset($_POST['surname']) && strlen($_POST['surname']) > 0){
    $term['surname'] =  $prepare->dumpSpecialChars($_POST['surname']);
}
if(isset($_POST['email']) && strlen($_POST['email']) > 0 && $_GET['settings'] != 'products'){
    $term['email'] = $prepare->dumpSpecialChars($_POST['email']);
}
$result = null;

if(isset($_GET['settings'])){
    if($_GET['settings'] == 'orders'){
        $result = $search->getSpecificResults('orders',$term);
    }
    else if($_GET['settings'] == 'users'){
        $result = $search->getSpecificResults('users',$term);
    }
    else if($_GET['settings'] == 'products'){
        $result = $search->getSpecificResults('products',$term);
    }
    else {
        echo 'No results, select page.';
    }
    $exitTo .= '&settings='.$_GET['settings'].'&display=20&pagination=1';
}
$_SESSION['searchRes'] = $result;
//echo $exitTo;
echo var_dump($result);

//header('Location: '.$exitTo);
