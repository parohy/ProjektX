<?php
session_start();
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
	private $userName;
	private $userId;
    private $user;
	
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

        if($this->userExists($email)) {
            if($this->user['delete'] == 0 && password_verify($password,$this->user['password'])) {
                $this->userName = $this->user['name'];
                $this->userId = $this->user['userid'];
                $_SESSION['userrole'] = $this->user['role'];

                return true;
            }
        }

		return false;
	}
	
	
	/**
	 * @author Tomas Paronai
	 * @return $this->name - the name of the logged in user.
	 */
	public function getName(){
		return $this->userName;
	}
	
	/**
	 * @author Tomas Paronai
	 * @return $this->id - the id of the logged in user.
	 */
	public function getUserId(){
		return $this->userId;
	}

    /**
     * @author Matus Kacmar
     */
    private function userExists($mail) {
        $this->handlerDB->query('SELECT email,password,name,userid,role FROM users WHERE email=:mail');
        $this->handlerDB->bind(":mail",$mail);
        $this->user = $this->handlerDB->singleRecord();

        if($this->user != null) {
            return true;
        }

        return false;
    }
}