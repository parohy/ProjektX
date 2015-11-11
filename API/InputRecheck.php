

<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once ('../API/Database.php');

class Recheck{
	private $handlerDB;
	
	function __construct(){
		$this->handlerDB = new DBHandler();
	}
	
	/*
	return 2 - long email
	return 1 - email used
	return true - all OK
	*/
	public function checkEmail($email,$size){
		if(strlen($email) > $size){
			return 2;
		}
		
		$this->handlerDB->query('SELECT email FROM users');

        $users = array();
		$users = $this->handlerDB->resultSet();
		$count = count($users);
		
		for($i=0;$i<$count;$i++){
			if($users[$i]['email'] == $email){
				return 1;
			}
		}
		return true;
	}
	
	/*
	 return 2 - long input
	 return true - all OK
	 */
	public function checkInput($input, $size){
		if(strlen($input) > $size){
			return 2;
		}
		return true;
	}
	
	public function dumpSpecialChars($input) {
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
	
		return $input;
	}
}