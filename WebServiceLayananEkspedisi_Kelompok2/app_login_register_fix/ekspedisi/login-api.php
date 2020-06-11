

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($_POST['remember'])) {
        $remember = TRUE;
    } else {
        $remember = FALSE;
    }

    // if($database->login($email,$password,$remember))
    // {
    //   header('location:');
    // } 
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost/rest-api-example/api/login.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "{\n\t\"email\": \"$email\",\n\t\"password\": \"$password\"\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response);
    setcookie("token", $data->jwt, time() + (86400 * 1), "/");

    header('location: beranda.php');
}

?>