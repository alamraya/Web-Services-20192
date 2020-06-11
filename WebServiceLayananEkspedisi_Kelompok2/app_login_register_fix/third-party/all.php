<?php

include "curl.php";

header("Content-Type: application/json; charset=UTF-8");

$result_all = http_request("http://api.shipping.esoftplay.com/city/");

$hasil_all = json_decode($result_all);
echo json_encode($hasil_all,JSON_UNESCAPED_SLASHES);








?>