<?php

include "curl.php";
header("Content-Type: application/json; charset=UTF-8");
include_once '../models/array_object.php';


// $getCovidCountries = http_request("https://corona.lmao.ninja/v2/countries");

// $result_getCovidCountries = json_decode($getCovidCountries,true);
// // echo json_encode($result_getCovidCountries, JSON_UNESCAPED_SLASHES);
// print_r($result_getCovidCountries);

$getcovidCountries = http_request("http://api.shipping.esoftplay.com/city/");
$hasilget = json_decode($getcovidCountries,true);
$hasilget1 = json_encode($hasilget,JSON_UNESCAPED_SLASHES);
var_dump($hasilget1);

// $to_objek = new array_object();
// $data_CovidCountries = $to_objek->arrayKeObject($hasilget);

echo $hasilget1[0]->country;
// echo $covid->country_id = $hasilget1->countryInfo;
// echo $covid->cases =  $hasilget1->cases;
// echo $covid->todayCases = $hasilget1->todayCases;
// echo $covid->deaths = $hasilget1->deaths;

// foreach($data_CovidCountries as $row => $value_row){
//     echo $data_CovidCountries->$row;

// }



// foreach($binatang as $jenis) {
//     foreach($jenis as $nama) {
//         echo $nama . ", ";
//     }
//     echo "<br />";
// }

// foreach($hasil_countries as $row){
//     foreach($row as $isi){
//         echo $isi .", ";
//     }
//         echo "<br />";
// }

// echo $result_getCovidCountries['0']['countryInfo']['_id'];
// echo $result_getCovidCountries['0']['country'];
// foreach ($result_getCovidCountries as $row => $value_row) {
// 	echo $row.": ";
// 		foreach ($value_row as $key => $data_CovidCountries) {
//             if(is_array($data_CovidCountries)== true){
//                 foreach($data_CovidCountries as $key_data_country => $data_country){
//                     echo $data_country. " ";
//                 }
//             }else{
//                 echo $data_CovidCountries." ";
//             }
// 		}
// 	echo "<br>";
// }

// foreach($result_getCovidCountries as $row => $value_row){
//     foreach ($value_row as $key => $data_CovidCountries) {
//         if(is_array($data_CovidCountries)==true){
//             foreach($data_CovidCountries as $key_data_country => $data_country){
//                 if($key_data_country =='_id'){
//                 $country_id = $data_CovidCountries[$row][$key_data_country][$data_country];
//                 }
//             }
//         }else{
//             $country = $data_CovidCountries;
//             $country_id = $data_CovidCountries[$row]['countryInfo']['_id'];
//             $cases = $data_CovidCountries[$row]['cases'];
//             $todayCases = $data_CovidCountries[$row]['todayCases'];
//             $deaths = $data_CovidCountries[$row]['deaths'];
//             $todayDeaths = $data_CovidCountries[$row]['todayDeaths'];
//             $recovered = $data_CovidCountries[$row]['recovered'];
//             $active = $data_CovidCountries[$row]['active'];
//             $critical = $data_CovidCountries[$row]['critical'];
//             $casesPerOneMillion = $data_CovidCountries[$row]['casesPerOneMillions'];
//             $deathsPerOneMillion =  $data_CovidCountries[$row]['deathsPerOneMillions'];
//             $tests =  $data_CovidCountries[$row]['tests'];
//             $testsPerOneMillion =  $data_CovidCountries[$row]['testsPerOneMillions'];
//             $continent =  $data_CovidCountries[$row]['continent'];
//         }
    
//     }
// }

// function array_to_object($array = array()) {
//     return (object) $array;
//     }

// $data = array_to_object($hasil_countries);
// var_dump($data);
// echo $data->country; 
// echo $data->country_id;
// echo $data->cases;
// echo $data->todayCases;
// echo $data->deaths;
// echo $data->todayDeaths;
// echo $data->recovered;
// echo $data->active;
// echo $data->critical;
// echo $data->casesPerOneMillion;
// echo $data->deathsPerOneMillion;
// echo $data->tests;
// echo $data->testsPerOneMillion;
// echo $data->continent;  

