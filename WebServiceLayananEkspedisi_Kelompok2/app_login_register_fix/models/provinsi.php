<?php

class prov{
    private $conn;
    
    // Constructor with DB
    public function __construct($db){
        $this->conn = $db;
        $this->province = 'province';
    }


    // create data
    function create(){
        // Prepare statement
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->province."(
                province_id,
                province)
            VALUES(?,?)");
        // Clean Data
        $this->province_id = htmlspecialchars(strip_tags($this->province_id));
        $this->province = htmlspecialchars(strip_tags($this->province));
       

        // Bind Data
        $stmt->bind_param("si", 
        $this->province_id,
        $this->province
    );
        // Execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;		 
    }

    //get data
    function readprov(){	
        if($this->province_id) {
            // Prepare statement & get data berdasarkan id
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->province." WHERE province_id = ?");
            // Bind ID
            $stmt->bind_param("s", $this->province_id);					
        } else {
            // Prepare statement & get data All
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->province);		
        }
      // Execute query		
        $stmt->execute();			
        $result = $stmt->get_result();		
        return $result;	
    }
    
    //delete data
    function delete(){
        // Prepare statement & get data berdasarkan id
        $stmt = $this->conn->prepare("DELETE FROM ".$this->province." WHERE province_id = ?");
        // Clean data
        $this->province_id = htmlspecialchars(strip_tags($this->province_id));
        // Bind ID
        $stmt->bind_param("s", $this->province_id);
        // Execute Query
        if($stmt->execute()){
            return true;
        }
     
        return false;		 
    }
}