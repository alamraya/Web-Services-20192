<?php
// 'user' object
class Pengiriman{
 
    // database connection and table name
    private $conn;
    private $table_name = "pengiriman";
 
    // object properties
    public $id_pengirim;
    public $nama_pengirim;
    public $asal;
    public $nama_penerima;
    public $tujuan;
    public $harga;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
// create() method will be here
// create new user record
function create(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
                nama_pengirim = :nama_pengirim,
                asal = :asal,
                nama_penerima = :nama_penerima,
                tujuan = :tujuan
                harga = :harga";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nama_pengirim=htmlspecialchars(strip_tags($this->nama_pengirim));
    $this->asal=htmlspecialchars(strip_tags($this->asal));
    $this->nama_penerima=htmlspecialchars(strip_tags($this->nama_penerima));
    $this->tujuan=htmlspecialchars(strip_tags($this->tujuan));
    $this->harga=htmlspecialchars(strip_tags($this->harga));
 
    // bind the values
    $stmt->bindParam(':firstname', $this->nama_pengirim);
    $stmt->bindParam(':lastname', $this->asal);
    $stmt->bindParam(':nama_pengirim', $this->nama_penerima);
    $stmt->bindParam(':tujuan', $this->tujuan);
    $stmt->bindParam(':harga', $this->harga);
 
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

 
// update() method will be here
// update a user record
public function update(){

 
    // if no posted password, do not update the password
    $query = "UPDATE " . $this->table_name . "
            SET
                nama_pengirim = :nama_pengirim,
                asal = :asal,
                nama_penerima= :nama_penerima,
                tujuan= :tujuan,
                harga= :harga
                {$password_set}
            WHERE id_pengirim = :id_pengirim";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
   // sanitize
   $this->nama_pengirim=htmlspecialchars(strip_tags($this->nama_pengirim));
   $this->asal=htmlspecialchars(strip_tags($this->asal));
   $this->nama_penerima=htmlspecialchars(strip_tags($this->nama_penerima));
   $this->tujuan=htmlspecialchars(strip_tags($this->tujuan));
   $this->harga=htmlspecialchars(strip_tags($this->harga));

   // bind the values
   $stmt->bindParam(':firstname', $this->nama_pengirim);
   $stmt->bindParam(':lastname', $this->asal);
   $stmt->bindParam(':nama_pengirim', $this->nama_penerima);
   $stmt->bindParam(':tujuan', $this->tujuan);
   $stmt->bindParam(':harga', $this->harga);
    // unique ID of record to be edited
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
}
?>