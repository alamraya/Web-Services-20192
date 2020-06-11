<?php

class Database{
	
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "ekspedisi"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			// Change character set to utf8 --> solusi data tidak muncul saat di json_encode()
			$conn->set_charset("UTF-8");
			return $conn;

		}
		
    }
}