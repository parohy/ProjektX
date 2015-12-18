<?php

/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 19:09
 */


include_once (ROOT . 'API/Database.php');

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
            echo '<span class="user-controls"><a href="?page=private/pageSettings&settings=editUser/userPreview&userid=' . $users[$i]['userid'] . '">View</a>
            	                              <a href="?page=private/pageSettings&settings=editUser/editUser&userid=' . $users[$i]['userid'] . '">Edit</a>
            				                  <a href="?page=private/pageSettings&settings=editUser/deleteUser&userid=' . $users[$i]['userid'] . '">Delete</a></span>';
            echo '</li>';
        }

        echo '</ul>';
        echo '<a class="user-controls" href="?page=private/pageSettings&settings=editUser/editUser">New User</a>';
        
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