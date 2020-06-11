<?php


include_once '../config/Database.php';
include_once '../models/CovidAllpertama.php';
// include_once 'function/utf.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

function sum_row( $key){
    $key = 0;
    while ($row = $result->fetch())
    {
        $key += $row['$key'];
    }
    return $key;
}


function get($result){
    if($result -> num_rows > 0){
        // if($key =='cases'){
        //     sum_row($key);
        //     $cases = $key;
        // }
        // foreach ($field as $field) {
        //     echo $field;
        // }
        

        $covidAll = array(
            "cases"=> 7154,
            "todayCases"=> 3793,
            "deaths"=> 244801,
            "todayDeaths"=> 138,
            "recovered"=> 1124416, 
            "active"=> 2115925,
            "critical"=> 50866,
            "casesPerOneMillion"=> 447,
            "deathsPerOneMillion"=> 31,
            "tests"=> 36530463,
            "testsPerOneMillion"=> 4685.4,
            "affectedCountries"=> 214
        );

        http_response_code(200);
        // echo json_encode(utf8ize($covidAll));
        echo json_encode($covidAll);

        echo json_last_error_msg();

        
    }else{
        http_response_code(404);
        echo json_encode(
            array("message"=>"No Data Covid-19 Found")
        );
    }
}
// GET REQUEST
    $database = new Database();
    $db = $database->getConnection();
    $covidAll = new CovidAll($db);
    // $covid->id = (isset($_GET['id']) ? $_GET['id'] : '0');
    // $covid->countryInfo_id = (isset($covid->countryInfo_id) ? $covid->countryInfo_id : '0');
    $result = $covidAll->read();
    print_r( $result);
    get($result);

    function getCovidAll(){
		return $this->covidAll;
	}

