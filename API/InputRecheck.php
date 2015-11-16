

<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once ('../API/Database.php');

/**
 * Creates an instance of checking object which validates and rechecks the user inputs.
 * @author Tomas Paronai
 *
 */
class Recheck{
	private $handlerDB;
	
	function __construct(){
		$this->handlerDB = new DBHandler();
	}

	/**
	 * Checks the email if its out of bounds and if the email is already in the database.
	 * @author Tomas Paronai
	 * @param $email - email we want to check
	 * @param $size - the max number of chars the string can have
	 * @return "Input out of bounds." - long input
	 * @return "Email already used." - same email found in the database
	 * @return "Invalid email." - invalid email format
	 * @return true - all OK
	 */
	public function checkEmail($email,$size){
		if(strlen($email) > $size){
			return "Input out of bounds.";
		}
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return "Invalid email.";
		}
		
		$this->handlerDB->query('SELECT email FROM users');

        $users = array();
		$users = $this->handlerDB->resultSet();
		$count = count($users);
		
		for($i=0;$i<$count;$i++){
			if($users[$i]['email'] == $email){
				return "Email already used.";
			}
		}
		return true;
	}
	
	/**
	 * Checks if the input string isnt out fo bounds.
	 * @author Tomas Paronai
	 * @param $input - the string we want to check
	 * @param $size - the max number of chars the string can have
	 * @return "Input out of bounds." - long input
	 * @return true - all OK
	 */
	public function checkInput($input, $size){
		if(strlen($input) > $size){
			return "Input out of bounds.";
		}
		return true;
	}
	
	/**
	 * Deletes all special characters from the string.
	 * @author Matus Kacmar
	 * @param $input - the string we want to clean
	 * @return $input - clean string  
	 */
	public function dumpSpecialChars($input) {
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
	
		return $input;
	}
}