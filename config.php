<?php
	class DatabaseConnect
	{
	private $db_host = "localhost";
	private $db_user = "batuhan";
	private $db_pass = "123321";
	private $db_name = "bus";
	private $db;
			function __construct(){}
		
			public function Connect()
			{
			 $this->db =  new  mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name); // We access the Database
				
				// checking connection
				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_error());
					exit();
				}	
				
				return  $this->db;
			}
	}
?>