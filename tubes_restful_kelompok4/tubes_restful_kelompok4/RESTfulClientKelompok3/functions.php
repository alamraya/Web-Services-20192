<?php

function getData($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET", 
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

function postData($url, $stringData)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $stringData,
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

function putData($url, $id, $stringData)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url . $id . '/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $stringData,
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json"
        ), 
    ));
    
    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

function deleteData($url, $id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}
?>