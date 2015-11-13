<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once ('../API/Database.php');

/**
 * Handle for saving user information into the database.
 * @author Tomas Paronai
 *
 */
class User{
	
	private $id;	
	private $handlerDB;
	private $success = false;
	
	function __construct($name, $surname, $email, $password){
		$this->handlerDB = new DBHandler();
				
			$this->saveFirstData('name', $name);
			$this->id = $this->getValidId();
			
		if($this->id != null && $this->id != 0){
			$this->saveData('surname', $surname, $this->id);
			$this->saveData('email', $email, $this->id);
			$this->saveData('password', $password, $this->id);
		}
				
	}
	
	/**
	 * Saves the user address information in the database.
	 * @author Tomas Paronai
	 * @param $address
	 * @param $city
	 * @param $postcode
	 */
	private function saveAddress($address, $city, $postcode){
		
		if($this->id != null){
			if($address!=null){
				$this->saveData('address', $address, $this->id);
			}
			if($city!=null){
				$this->saveData('city', $city, $this->id);
			}
			if($postcode!=null){
				$this->saveData('postcode', $postcode, $this->id);
			}
		}
		
	}

	/**
	 * @author Tomas Paronai
	 * @return - id of the user which is being handled
	 */
	public function getValidId(){
		$this->handlerDB->query('SELECT * FROM users');

        $users = array();
		$users = $this->handlerDB->resultSet();
		$count = count($users);
		
		return $users[$count-1]['userid'];
	}
	
	/**
	 * Saves the first data in the table.
	 * @author Tomas Paronai
	 * @param $parameter - name of the colum
	 * @param $value
	 */
	private function saveFirstData($parameter, $value){
		//echo '<br/>',$parameter,$value,'<br/>';
		$this->handlerDB->query("INSERT INTO users (`".$parameter."`) VALUES (:input)");
		$this->handlerDB->bind(":input",$value);
		try{
			$this->handlerDB->execute();
		}catch(PDOException $e){
			echo $e;
		}
	}
	
	/**
	 * Edits user info by the given id | saves the user input in the database.
	 * @author Tomas Paronai
	 * @param $parameter - name of the colum
	 * @param $value
	 * @param $id - given id
	 */
	private function saveData($parameter, $value, $id){
		//echo '<br/>',$parameter,$value,$id,'<br/>';
		$this->handlerDB->query("UPDATE users SET `".$parameter."`=:input WHERE `userid`=(:userid)");
		$this->handlerDB->bind(":input",$value);
		$this->handlerDB->bind(":userid",$id);
		try{
			$this->handlerDB->execute();
		}catch(PDOException $e){
			echo $e;
		}
		$this->success = true;
	}
	
	/**
	 * @author Tomas Paronai
	 * @return "User registered." - user was successfuly saved in the database
	 * @return "Registration failed." - saving failed. Probably database error.
	 */
	public function isSaved(){
		if($this->success){
			return "User registered.";
		}
		return "Registration failed.";
	}
}