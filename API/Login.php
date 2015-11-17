<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once 'Database.php';

/**
 * Handle for checking user login information with the database.
 * @author Tomas Paronai
 *
 */
class Login{
	
	private $handlerDB;
	private $name;
	private $password = "admin2015";
	
	function __construct(){
		$this->handlerDB = new DBHandler();
	}
	
	/**
	 * Compares the email and password if they match the data in database.
	 * @param $email - login email
	 * @param $password - login password
	 * @return false - email or password not matching
	 * @return true - login correct
	 */
	public function checkLogin($email, $password){
		if($this->name != "admin"){
			$this->handlerDB->query('SELECT email,password,name FROM users');
			
			$users = array();
			$users = $this->handlerDB->resultSet();
			$count = count($users);
			
			for($i=0;$i<$count;$i++){
				if($users[$i]['email'] == $email && $users[$i]['password'] == $password){
					$this->name = $users[$i]['name'];
					return true;
				}
			}
		}
		else if($this->name == "admin"){
			if($this->name == $email && $this->password == $password){
				return true;
			}
		}		
		return false;
	}
	
	public static function adminLogin(){
		$instance = new self();
		$instance->name = "admin";
		return $instance;
	}
	
	/**
	 * @return $this->name - the name of the logged in user.
	 */
	public function getName(){
		return $this->name;
	}
}

?>