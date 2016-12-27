<?php
//include('password.php');
abstract class User{

    private $_db;
	public $name;
	public $surname;
	public $TCID;
	public $gender;
	public $TravelCardID;

   abstract protected function getValues();
    
		
	function log($log,$id){
	
			$stmt = $this->_db->prepare('INSERT INTO logs (memberID,log,time) VALUES (:memberID, :log, :time)');
							$stmt->execute(array(
							':memberID' => $id,
							':log' => $log,
							':time' => date("Y-m-d H:i:s")
							
							
			));		
	}
	
	function get_user_hash($username){	

		try {
			$stmt = $this->_db->prepare('SELECT password FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	function login($username,$password){
	$this->name = $username;
		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
		    
		    $_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
		    return true;
		} 	
	}
		
	function logout(){
		session_destroy();
	}
	
	abstract function checkPass($username,$password){}
	
	function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
	
}


?>