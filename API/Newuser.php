<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include ('../API/Database.php');

class User{
	
	private $id;	
	private $handlerDB;
	
	function __construct($name, $surname, $email, $password, $address, $city, $postcode){
		$this->handlerDB = new DBHandler();
		
		$this->id = getValidId();	
		if($this->id != null && $this->id != 0){
			$this->saveData('name', $name, $this->id);
			$this->saveData('surname', $surname, $this->id);
			$this->saveData('email', $email, $this->id);
			$this->saveData('password', $password, $this->id);
		}
		
		$this->saveAddress($address, $city, $postcode);
		
		//redirect to mainpage
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

	private function getValidId(){
		$this->handlerDB->query('SELECT userid FROM users');

        $users = array();
		$users = $this->handlerDB->resultSet();
		$count = count($users);
		
		return $users[$count-1]['userid']+1;
	}
	
	private function saveData($parameter, $value, $id){
		$this->handlerDB->query('INSERT INTO users '%$parameter%' VALUE :value WHERE userid=:userid');
		$this->handlerDB->bind(':value',''%$value%'');
		$this->handlerDB->bind(':userid',''%$id%'');
		$this->handlerDB->execute();
	}
}