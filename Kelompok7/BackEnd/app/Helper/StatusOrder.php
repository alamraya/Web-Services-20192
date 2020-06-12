<?php
namespace App\Helper;
use Illuminate\Support\Facades\Http;

class StatusOrder {
    /*
        Status Order
        1 => order Created, waiting payment
        2 => payment received
        3 => processing order
        4 => package on deliver
        5 => order success
        6 => order canceled
    */
    
    public static function check($status)
    {
        switch ($status) {
            case 1 :
                return "Menunggu pembayaran.";
            case 2 :
                return "Pembayaran diterima.";
            case 3 :
                return "Pesanan sedang diproses.";
            case 4 :
                return "Pesanan dikirim.";
            case 5 :
                return "Pesanan selesai.";
            case 6 :
                return "Pesanan dibatalkan.";
        }
    }

    public static function track($waybill,$courier)
    {
        $trackApi = "http://api.shipping.esoftplay.com/waybill/$waybill/$courier";
        $response = Http::get($trackApi);
        $result = $response->json();
        $hasil = isset($result['result']) ?$result['result']  : [];
    
        if(!$hasil){
            $trackApi = "https://api.econxn.id/v1/couriers/waybill/";
            $response = Http::post($trackApi, [
                'waybill' => $waybill,
                'courier' => $courier,
            ]);
            $result = $response->json();
            $hasil = isset($result['result']) ?$result['result']  : [];
        }
        return $hasil;
    }
}