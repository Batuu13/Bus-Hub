<?php

class Customer extends User{

    private $_db;
	public $name;
	public $surname;
	public $TCID;
	public $gender;
	public $TravelCardID;

  	function __construct($db){
    	
    
    	$this->_db = $db;
		if(isset($_SESSION['TCID'])){
		$this->getValues($_SESSION['TCID']);
		}
    }
		
	public function createTravelCard($TCID)
	{
		$startPoint = 0;
			$stmt = $this->_db->prepare('INSERT INTO travelcard (Points) VALUES (:points)');
					$stmt->execute(array(
					':points' => $startPoint));							
							
		return 	$this->_db->lastInsertId();
	}
	
	function get_user_hash($TCID){	
	
		try {
			$stmt = $this->_db->prepare('SELECT Password FROM customer WHERE TCID = :TCID');
			$stmt->execute(array('TCID' => $TCID));
			
			$row = $stmt->fetch();
			
			return $row['Password'] ;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	function login($userID,$password){
	
		$hashed = $this->get_user_hash($userID);
		$password = hash("sha512",$password);
		if($password === $hashed){
		    
		    $_SESSION['loggedin'] = true;
			$_SESSION['TCID'] = $userID;
		    return true;
		} 	
	}
	
	protected function getValues($TCID){
		
		$stmt = $this->_db->prepare('SELECT * FROM customer WHERE TCID = :TCID');
			$stmt->execute(array('TCID' => $TCID));
			$row = $stmt->fetch();
			$this->surname = $row['Surname'];
			$this->name = $row['Name'];
			$this->TCID = $row['TCID'];
			$this->gender = $row['Gender']; //TODO Transform gender into string(Male/Female)
			$this->TravelCardID = $row['TravelCardID'];
	}
	
}
?>