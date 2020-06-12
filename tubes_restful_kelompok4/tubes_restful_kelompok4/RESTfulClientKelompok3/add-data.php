<?php
include('functions.php');

if(isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];

    $stringData = "nama=$nama&kategori=$kategori&harga=$harga";
    $response = postData("http://localhost:8080/DapurBunda/api/json/create", $stringData);
    $response = json_decode($response);
    $success = $response->success;
    $message = $response->message;

    header("Location: index.php?success=$success&message=$message");
}