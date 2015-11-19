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
	
	function __construct(){
		$this->handlerDB = new DBHandler();
	}
	
	/**
	 * Compares the email and password if they match the data in database.
	 * @author Tomas Paronai
	 * @param $email - login email
	 * @param $password - login password
	 * @return false - email or password not matching
	 * @return true - login correct
	 */
	public function checkLogin($email, $password){
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
		return false;
	}
	
	/**
	 * Creates an admin login instance.
	 * @author Tomas Paronai
	 * @return $instance 
	 */
	public static function adminLogin(){
		$instance = new self();
		$instance->name = "admin";
		return $instance;
	}
	
	/**
	 * @author Tomas Paronai
	 * @return $this->name - the name of the logged in user.
	 */
	public function getName(){
		return $this->name;
	}
}

?>