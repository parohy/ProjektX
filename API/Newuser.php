<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once ('../API/Database.php');

class User{
	
	private $id;	
	private $handlerDB;
	
	function __construct($name, $surname, $email, $password){
		$this->handlerDB = new DBHandler();
		
		
		echo $name,$surname,$email,$password,'<br/>';
		
			$this->saveFirstData('name', $name);
			$this->id = $this->getValidId();
			
		if($this->id != null && $this->id != 0){
			$this->saveData('surname', $surname, $this->id);
			$this->saveData('email', $email, $this->id);
			$this->saveData('password', $password, $this->id);
		}
				
	}
	
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

	public function getValidId(){
		$this->handlerDB->query('SELECT * FROM users');

        $users = array();
		$users = $this->handlerDB->resultSet();
		$count = count($users);
		
		return $users[$count-1]['userid'];
	}
	private function saveFirstData($parameter, $value){
		echo '<br/>',$parameter,$value,'<br/>';
		$this->handlerDB->query("INSERT INTO users (`".$parameter."`) VALUES (:input)");
		$this->handlerDB->bind(":input",$value);
		try{
			$this->handlerDB->execute();
		}catch(PDOException $e){
			echo $e;
		}
	}
	
	private function saveData($parameter, $value, $id){
		echo '<br/>',$parameter,$value,$id,'<br/>';
		$this->handlerDB->query("UPDATE users SET `".$parameter."`=:input WHERE `userid`=(:userid)");
		$this->handlerDB->bind(":input",$value);
		$this->handlerDB->bind(":userid",$id);
		try{
			$this->handlerDB->execute();
		}catch(PDOException $e){
			echo $e;
		}
							
	}
}