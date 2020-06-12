<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\API\RegionController as Region;
use Illuminate\Support\Collection;

class ShippingAddress extends Model
{
    protected $table = "shipping_address";
    protected $fillable = ["user_id","address","province","city","district","status","is_primary","name","postal_code"];
    
    protected $appends = ['province_name',"city_name","district_name"];
    
    public function getProvinceNameAttribute()
    {
        if($this->province != ''){
            $provinces = (new Region)->province(1);
            $province = $this->province;
            $curr_provinsi = collect($provinces)->filter(function($prov) use ($province)
            {
                return $prov->province_id == $province;
            });
            foreach($curr_provinsi as $item){
                return $item->province;
            }
            return "";
        }
        return "";
    }

    public function getCityNameAttribute()
    {
        if($this->province != '' && $this->city != ''){
            $province = $this->province;
            $cities = (new Region)->city($province,1);
            $city = $this->city;
            $curr_city = collect($cities)->filter(function($cit) use ($city)
            {
                return $cit->city_id == $city;
            });
            foreach($curr_city as $item){
                return "$item->type. $item->city_name";
            }
            return "";
        }
        return "";
    }

    public function getDistrictNameAttribute()
    {
        if($this->province != '' && $this->city != '' && $this->district != ''){
            $city = $this->city;
            $districts = (new Region)->district($city,1);
            $district = $this->district;
            $curr_district = collect($districts)->filter(function($dist) use ($district)
            {
                return $dist->subdistrict_id == $district;
            });
            foreach($curr_district as $item){
                return "Kecamatan. $item->subdistrict_name";
            }
            return "";
        }
        return "";
    }
}