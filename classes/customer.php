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
		if(isset($_SESSION['username'])){
		$this->getValues($_SESSION['username']);
		}
    }
		
	
	protected function getValues($TCID){
		
		$stmt = $this->_db->prepare('SELECT * FROM customer WHERE TCID = :TCID');
			$stmt->execute(array('TCID' => $TCID));
			$row = $stmt->fetch();
			$this->surname = $row['surname'];
			$this->name = $row['name'];
			$this->TCID = $row['TCID'];
			$this->gender = $row['gender']; //TODO Transform gender into string(Male/Female)
			$this->TravelCardID = $row['TravelCardID'];
	}
	
}
?>