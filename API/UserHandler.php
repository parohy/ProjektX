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
	
	private function __construct(){
		$this->handlerDB = new DBHandler();								
	}
	
	/**
	 * Creates an UserHandler instance with only the given params
	 * @author Tomas Paronai
	 * @param $name
	 * @param $surname
	 * @param $email
	 * @param $password
	 */
	public static function newUser($name, $surname, $email, $password){
		 $instance = new self();	
		 $instance->saveFirstData('name', $name);
		 $instance->id = $instance->getValidId();
		 	
		 if($instance->id != null && $instance->id != 0){
		 $instance->saveData('surname', $surname);
		 $instance->saveData('email', $email);
		 $instance->saveData('password', $password);
		 }
		 
		 return $instance;
	}
	
	/**
	 * Creates an UserHandler instance with only the given ID
	 * @author Tomas Paronai
	 * @param $id
	 */
	public static function editUser($id){
		$instance = new self();
		$instance->id = $id;
		return $instance;
	}
	
	/**
	 * 
	 * @author Tomas Paronai
	 * @param $address
	 * @param $city
	 * @param $postcode
	 */
	public function saveAddress($address, $city, $postcode){
		
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
	 * @param $id
	 */
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
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
	public function saveFirstData($parameter, $value){
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
	public function saveData($parameter, $value){
		//echo '<br/>',$parameter,$value,$id,'<br/>';
		$this->handlerDB->query("UPDATE users SET `".$parameter."`=:input WHERE `userid`=(:userid)");
		$this->handlerDB->bind(":input",$value);
		$this->handlerDB->bind(":userid",$this->id);
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
	
	public function getData($parameter){
		if($this->id != null){
			$this->handlerDB->query("SELECT `".$parameter."`,`userid` FROM users");
			$users = $this->handlerDB->resultSet();
			
			for($i=0;$i<count($users);$i++){
				if($users[$i]['userid']==$this->id){
					return $users[$i][$parameter];
				}
			}
			return "Parameter not found.";
		}
		return "Id not set.";
	}
}