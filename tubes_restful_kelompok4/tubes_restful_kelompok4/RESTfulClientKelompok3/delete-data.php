<?php
include('functions.php');

if(isset($_POST["submit"])) {
    $id = $_POST["id"];

    $response = deleteData("http://localhost:8080/DapurBunda/api/json/delete/", $id);
    $response = json_decode($response);
    $success = $response->success;
    $message = $response->message;

    header("Location: index.php?success=$success&message=$message");
}