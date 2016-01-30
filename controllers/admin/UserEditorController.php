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
        $this->handlerDB->query('SELECT * FROM users WHERE role=1');
        $results = $this->handlerDB->resultSet();
        $this->handlerDB->endTransaction();

        return $results;
    }

    public function displayUsers($users, $pagination, $display) {

        $max = count($users);
        if($pagination * $display > $max)
        {
            $amount = $max;
        }
        else
        {
            $amount = $pagination * $display;
        }

        echo '<ul class="items">';

        for($i = ($pagination - 1) * $display; $i < $amount; $i++) {
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
        
        echo '<div class="paging">';
        echo '<div class="displayAmount">';
        echo '<a class="page" href="?page=private/pageSettings&settings=users&display=10&pagination=1">10</a>';
        echo '<a class="page" href="?page=private/pageSettings&settings=users&display=20&pagination=1">20</a>';
        echo '<a class="page" href="?page=private/pageSettings&settings=users&display=50&pagination=1">50</a>';
        echo '<a class="page" href="?page=private/pageSettings&settings=users&display=100&pagination=1">100</a>';
        echo '</div>';

        
        $pages = count($users) / $display;
        if(count($users) % $display != 0)
        {
            $pages++;
        }
        
        for($i=1; $i<=$pages; $i++)
        {
            echo '<a class="page" href="?page=private/pageSettings&settings=users&display='.$display.'&pagination='.$i.'">'.$i.'</a>';     	
        }
        echo '</div>';
    }
}