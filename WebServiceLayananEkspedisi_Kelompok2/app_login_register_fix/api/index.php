<?php

function request_provinsi()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "key: a606cd96d3335135276538e912833093"
        ),
    ));
    $httpCode = curl_getinfo($curl , CURLINFO_HTTP_CODE); // this results 0 every time
    $response = curl_exec($curl);
    if($response){
        save_file("provinsi.json",$response);
    }
    curl_close($curl);
    return $response;
}

function request_city($provinceId)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$provinceId",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "key: a606cd96d3335135276538e912833093"
        ),
    ));
    $httpCode = curl_getinfo($curl , CURLINFO_HTTP_CODE); // this results 0 every time
    $response = curl_exec($curl);
    if($response){
        save_file("city$provinceId.json",$response);
    }
    curl_close($curl);
}

function save_file($filename,$data)
{
    $myfile = fopen("./region/$filename", "w") or die("Unable to open file!");
    fwrite($myfile, $data);
    fclose($myfile);
}

function check_exist($filename)
{
    if(file_exists("./region/".$filename))
        return true;
    return false;
}


header('Content-Type: application/json');

// Misalkan request provinsi
// if(check_exist("provinsi.json")){
//     $myfile = fopen("./region/provinsi.json", "r") or die("Unable to open file!");
//     echo fread($myfile,filesize("./region/provinsi.json"));
//     fclose($myfile);
// }else{
//     echo request_provinsi();
// }

// Misal request City
$provinceId = 9;
if(check_exist("city$provinceId.json")){
    $myfile = fopen("./region/city$provinceId.json", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("./region/city$provinceId.json"));
    fclose($myfile);
}else{
    echo request_city($provinceId);
}