<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Http;


class CourierController extends BaseController
{
    private $endPointApi = "https://api.econxn.id/v1/couriers";

    public function list()
    {
        return $this->sendResponse([
            [
                "name" => "JNE Express",
                "code" => "jne"
            ],
            [
                "name" => "POS Indonesia",
                "code" => "pos"
            ],
            [
                "name" => "Tiki",
                "code" => "tiki"
            ],
            [
                "name" => "Wahana",
                "code" => "wahana"
            ],
            [
                "name" => "J&T Express",
                "code" => "jnt"
            ],
            [
                "name" => "RETAIL PARCEL EXPRESS (RPX)",
                "code" => "rpx"
            ],
            [
                "name" => "SiCepat",
                "code" => "sicepat"
            ],
            [
                "name" => "Ninja Van",
                "code" => "ninja"
            ],
            [
                "name" => "Lion Parcel",
                "code" => "lion"
            ]
        ],"success");
    }

    public function ongkir(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "origin" => "required",
            "destination" => "required",
            "weight" => "required",
            "courier" => "required"
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hasil = $this->alternatifOngkir($input);
        if(!$hasil){
            $ongkir = "$this->endPointApi/cost/";
            $response = Http::post($ongkir,[
                "origin" => $input['origin'],
                "originType" => "subdistrict",
                "destination" => $input['destination'],
                "destinationType" => "subdistrict",
                "weight" => $input['weight'],
                "courier" => $input['courier']
            ]);
            $result = $response->json();
            $hasil = isset($result['results']) ? $result['results']  : [];
        }
        return $this->sendResponse($hasil,"Success");
    }

    private function alternatifOngkir($input)
    {
        $uri = "http://api.shipping.esoftplay.com/domesticCost/".$input['origin']
                ."/".$input['destination']."/".$input['weight']."/".$input['courier']."/subdistrict/subdistrict";
        $response = Http::get($uri);
        $result = $response->json();
        $hasil = isset($result['result']) ? $result['result']  : [];
        return $hasil;
    }
}