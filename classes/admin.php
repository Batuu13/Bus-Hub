<?php
class Admin{
	private $_db;
	public $userID;
	public $userType;
	public $name;
	public $gender;
	public $birthDate;
	
		function __construct($db)
		{
			$this->_db = $db;
			if(isset($_SESSION['admin'])){
			$this->getValues($_SESSION['admin']);
			}
		}
	
		private function getValues($userID)
		{
		
		$stmt = $this->_db->prepare('SELECT * FROM Users WHERE userID = :userID');
			$stmt->execute(array('userID' => $userID));
			$row = $stmt->fetch();
			$this->userType = $row['userType'];
			$this->name = $row['name'];
			$this->birthDate = $row['birthDate'];
			$this->gender = $row['gender']; //TODO Transform gender into string(Male/Female)
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
		
}
?>