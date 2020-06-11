<?php


if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost/rest-api-example/api/create_user.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\t\"firstname\": \"$firstname\",\n\t\"lastname\": \"$lastname\",\n\t\"email\": \"$email\",\n\t\"password\": \"$password\"\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($response);

    header('location: login.php');
}
