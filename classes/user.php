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