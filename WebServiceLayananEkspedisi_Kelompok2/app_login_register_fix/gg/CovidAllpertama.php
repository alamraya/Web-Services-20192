<?php
/* 
A domain Class to demonstrate RESTful web services
*/

Class CovidAll{

    private $conn;
    
    // Constructor with DB
    public function __construct($db){
        $this->conn = $db;
        $this->table_covid = 'covids';
    }

    public function read(){
        // Prepare statement
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_covid);
        $stmt->execute();
        $result = $stmt->get_result();
        $d['fields'] = $result->fetch_fields('covids');		

        return $result; 
        return $d['fields'];			

    }
    
}
    

?>