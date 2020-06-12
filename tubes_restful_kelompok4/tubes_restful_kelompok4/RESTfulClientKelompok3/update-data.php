<?php
include('functions.php');

if(isset($_POST["submit"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];

    $stringData = "nama=$nama&kategori=$kategori&harga=$harga";
    $response = putData("http://localhost:8080/DapurBunda/api/json/update/", $id, $stringData);
    $response = json_decode($response);
    $success = $response->success;
    $message = $response->message;

    header("Location: index.php?success=$success&message=$message");
}