<?php
class Country{
    
    public $conn;
    // private $table_country = 'countryinfo';

    // Constructor with DB
    public function __construct($db){
        $this->conn = $db;
        $this->table_country = 'countryinfo';
        $this->table_covid = 'covids';
    }
    // create data
    function create(){
        // Prepare statement
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->table_country."
                
                iso2,
                iso3,
                latitude,
                longitude,
                flag
                )
            VALUES(?,?,?,?,?)");
        // Clean Data
        $this->iso2 = htmlspecialchars(strip_tags($this->iso2));
        $this->iso3 = htmlspecialchars(strip_tags($this->iso3));
        $this->latitude = htmlspecialchars(strip_tags($this->latitude));
        $this->longitude = htmlspecialchars(strip_tags($this->longitude));
        $this->flag = htmlspecialchars(strip_tags($this->flag));

        // Bind Data
        $stmt->bind_param("ssiis", 
        $this->iso2,
        $this->iso3,
        $this->latitude,
        $this->longitude,
        $this->flag
    );
        // Execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;		 
    }
    //get data
    function readCountry(){	
        if($this->countryInfo_id) {
            // Prepare statement & get data berdasarkan countryInfo_id
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_country." WHERE countryInfo_id = ?");
            // Bind ID
            $stmt->bind_param("i", $this->countryInfo_id);					
        } else {
            // Prepare statement & get data All
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_country);		
        }
      // Execute query		
        $stmt->execute();			
        $result = $stmt->get_result();		
        return $result;	
    }
    
    //delete data
    function delete(){
        // Prepare statement & get data berdasarkan countryInfo_id
        $stmt = $this->conn->prepare("DELETE FROM ".$this->table_country." WHERE countryInfo_id = ?");
        // Clean data
        $this->countryInfo_id = htmlspecialchars(strip_tags($this->countryInfo_id));
        // Bind ID
        $stmt->bind_param("i", $this->countryInfo_id);
        // Execute Query
        if($stmt->execute()){
            return true;
        }
    
        return false;		 
    }
}