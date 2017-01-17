<?php

class Admin extends User{
	protected $_db;
	public $userID;
	public $userType;
	public $name;
	public $gender;
	public $birthDate;
	
		function __construct($db)
		{
			$this->_db = $db;
			if(isset($_SESSION['userID'])){
			$this->getValues($_SESSION['userID']);
			}
		}
		
		protected function getValues($userID)
		{
		
		$stmt = $this->_db->prepare('SELECT * FROM Users WHERE userID = :userID');
			$stmt->execute(array('userID' => $userID));
			$row = $stmt->fetch();
			$this->userType = $row['UserType'];
			$this->name = $row['Name'];
			$this->gender = $row['Gender']; //TODO Transform gender into string(Male/Female)
		}
		public function checkPass($userID,$password)
		{
			
			$hashed = hash("sha512",$password);
			$stmt = $this->_db->prepare('SELECT count(*) as exist FROM Users WHERE userID = :userID AND password = :pass');
			$stmt->execute(array('userID' => $userID, 'pass' => $hashed));
			$row = $stmt->fetch();
			
			if($row['exist'] == 1)
				return true;
			else
				return false;
		}
		function get_user_hash($UserID){	
	//todo encrypt
		try {
			$stmt = $this->_db->prepare('SELECT Password FROM users WHERE UserID = :UserID');
			$stmt->execute(array('UserID' => $UserID));
			
			$row = $stmt->fetch();
			return $row['Password'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	function login($userID,$password){
	
		$hashed = $this->get_user_hash($userID);
		
		if($password === $hashed){
		    
		    $_SESSION['aloggedin'] = true;
			$_SESSION['userID'] = $userID;
		    return true;
		} 	
	}
	public function is_logged_in(){
		if(isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == true){
			return true;
		}		
	}
	
}
?>