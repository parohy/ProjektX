<?php

/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 19:09
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path . 'API/Database.php');

class UserEditorController
{

    private $handlerDB;

    public function __construct() {
        $this->handlerDB = new DBHandler();
    }

    public function getUsers() {
        $this->handlerDB->beginTransaction();
        $this->handlerDB->query('SELECT * FROM users');
        $results = $this->handlerDB->resultSet();
        $this->handlerDB->endTransaction();

        return $results;
    }

    public function displayUsers($users, $displayFrom, $displayTo) {
		
    	$total = (count($users)-1)/5;
    	if((count($users))%5 != 0){
    		$total++;
    	}
    	
    	//echo count($users)/5;
        echo '<ul class="users">';

        for($i = $displayFrom; $i <= $displayTo; $i++) {
            echo '<li>';
            echo '<span class="username">' . $users[$i]['name'] . ' ' . $users[$i]['surname'] . '</span>';
            echo '<span class="email">' . $users[$i]['email'] . '</span>';
            echo '<span class="user-controls"><a class="page-link" href="?page=private/pageSettings&settings=editUser/userPreview&userid=' . $users[$i]['userid'] . '"><i class="fa fa-search-plus fa-2x"></i></a>
            	                              <a class="page-link" href="?page=private/pageSettings&settings=editUser/editUser&userid=' . $users[$i]['userid'] . '"><i class="fa fa-pencil-square-o fa-2x"></i></a>
            				                  <a class="page-link" href="?page=private/pageSettings&settings=editUser/deleteUser&userid=' . $users[$i]['userid'] . '"><i class="fa fa-times fa-2x"></i></a></span>';
            echo '</li>';
        }

        echo '</ul>';
        echo '<a class="page-link" class="user-controls" href="?page=private/pageSettings&settings=editUser/editUser"><i class="fa fa-plus-circle fa-2x"></i></a>';
        
        echo '<span class="paging">';
        for($i=1;$i<=$total;$i++){
        	$start = 1;
        	$end = 6;
        	if($i != 1){
        		$start += 5;
        		$end += 5;
        	}
        	
        	if($end > count($users)-1){
        		$temp = $end - count($users);
        		$end -= $temp;
        	}
        	echo '<a class="page" href="?page=private/pageSettings&settings=users&from='.$start.'&to='.$end.'">'.$i.'</a>';
        	//echo '<a class="page" href="'.$path.'?current='.$i.'">'.$i.'</a>';
        }
        echo '</span>';
    }
}