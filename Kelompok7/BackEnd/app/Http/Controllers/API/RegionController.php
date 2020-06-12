<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Storage;


class RegionController extends BaseController
{
    private $endPointApi = "https://api.econxn.id/v1/couriers";
    private $endPointBackup = "http://api.shipping.esoftplay.com";
    public function province($isModel=0)
    {
        $region = "$this->endPointApi/province";
        
        if(Storage::exists("provinsi.json")){
            $file = Storage::get("provinsi.json");
            if($isModel){
                return json_decode($file);
            }else{
                return $this->sendResponse(json_decode($file),"Success");
            }
        }
        $response = Http::get($region);
        $result = $response->json();
        $hasil = isset($result['results']) ? $result['results']  : [];
        if(!$hasil){
            $region = "$this->endPointBackup/province";
            $response = Http::get($region);
            $result = $response->json();
            $hasil = isset($result['result']) ? $result['result']  : [];
        }
        if($hasil){
            Storage::put('provinsi.json', json_encode($hasil));
        }
        if($isModel){
            return $hasil;
        }else{
            return $this->sendResponse($hasil,"Success");
        }
    }

    public function city($provinceId,$isModel=0)
    {
        $region = "$this->endPointApi/city/?province=$provinceId";
        if(Storage::exists("city$provinceId.json")){
            $file = Storage::get("city$provinceId.json");
            if($isModel){
                return json_decode($file);
            }
            return $this->sendResponse(json_decode($file),"Success");
        }
        $response = Http::get($region);
        $result = $response->json();
        $hasil = isset($result['results']) ? $result['results']  : [];
        if(!$hasil){
            $region = "$this->endPointBackup/city/$provinceId";
            $response = Http::get($region);
            $result = $response->json();
            $hasil = isset($result['result']) ? $result['result']  : [];
        }
        if($hasil){
            Storage::put("city$provinceId.json",json_encode($hasil));
        }
        if($isModel){
            return $hasil;
        }
        return $this->sendResponse($hasil,"Success");
    }

    public function district($cityId,$isModel=0)
    {
        $region = "$this->endPointApi/subdistrict/?city=$cityId";
        if(Storage::exists("district$cityId.json")){
            $file = Storage::get("district$cityId.json");
            if($isModel){
                return json_decode($file);
            }
            return $this->sendResponse(json_decode($file),"Success");
        }
        $response = Http::get($region);
        $result = $response->json();
        $hasil = isset($result['results']) ? $result['results']  : [];
        if(!$hasil){
            $region = "$this->endPointBackup/subdistrict/$cityId";
            $response = Http::get($region);
            $result = $response->json();
            $hasil = isset($result['result']) ? $result['result']  : [];
        }
        if($hasil){
            Storage::put("district$cityId.json",json_encode($hasil));
        }
        if($isModel){
            return $hasil;
        }
        return $this->sendResponse($hasil,"Success");
    }
}