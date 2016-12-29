<?php

abstract class User{


   abstract protected function getValues($TCID);
    
		
	function log($log,$id){
	
			$stmt = $this->_db->prepare('INSERT INTO logs (memberID,log,time) VALUES (:memberID, :log, :time)');
							$stmt->execute(array(
							':memberID' => $id,
							':log' => $log,
							':time' => date("Y-m-d H:i:s")
							
							
			));		
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

	function login($username,$password){
	
		$hashed = $this->get_user_hash($username);
		echo $password . " - " . $hashed;
		if($password === $hashed){
		    
		    $_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
		    return true;
		} 	
	}
		
	function logout(){
		session_destroy();
	}
	
	
	
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
	
}


?>