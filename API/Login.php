<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once 'Database.php';

class Login{
	
	private $handlerDB;
	
	function __construct(){
		$this->handlerDB = new DBHandler();
	}
	
	public function checkLogin($email, $password){
		$this->handlerDB->query('SELECT useremail,userpassword FROM users');
		
		$users = array();
		$users = $this->handlerDB->resultSet();
		$count = count($users);
		
		for($i=0;$i<$count;$i++){
			if($users[$i]['useremail'] == $email && $users[$i]['userpassword'] == $password){
				return true;
			}
		}
		return false;
	}
}

?>