<?php

class city{
    private $conn;
    
    // Constructor with DB
    public function __construct($db){
        $this->conn = $db;
        $this->kota = 'kota';
    }


    // create data
    function create(){
        // Prepare statement
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->kota."(
                city_id,
                province_id,
                province_id,
                province,
                type,
                city_name,
                postal_code)
            VALUES(?,?,?,?,?,?)");
        // Clean Data
        $this->city_id= htmlspecialchars(strip_tags($this->city_id));
        $this->province_id = htmlspecialchars(strip_tags($this->province_id));
        $this->province = htmlspecialchars(strip_tags($this->province));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->city_name = htmlspecialchars(strip_tags($this->city_name));
        $this->postal_code = htmlspecialchars(strip_tags($this->postal_code));
       

        // Bind Data
        $stmt->bind_param("siiiis", 
        $this->city_id,
        $this->province_id,
        $this->province,
        $this->type,
        $this->city_name,
        $this->postal_code
    );
        // Execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;		 
    }

    //get data
    function readcity(){	
        if($this->city_id) {
            // Prepare statement & get data berdasarkan id
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->kota." WHERE city_id = ?");
            // Bind ID
            $stmt->bind_param("i", $this->city_id);					
        } else {
            // Prepare statement & get data All
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->kota);		
        }
      // Execute query		
        $stmt->execute();			
        $result = $stmt->get_result();		
        return $result;	
    }
    
    //delete data
    function delete(){
        // Prepare statement & get data berdasarkan id
        $stmt = $this->conn->prepare("DELETE FROM ".$this->kota." WHERE city_id = ?");
        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->city_id));
        // Bind ID
        $stmt->bind_param("s", $this->city_id);
        // Execute Query
        if($stmt->execute()){
            return true;
        }
     
        return false;		 
    }
}