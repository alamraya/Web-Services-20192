<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;

use App\Model\ShippingAddress;

class ShippingAddressController extends BaseController
{
    public function getAddress(Request $request)
    {
        $limit = ($request['limit']) ? $request['limit'] : 10;
        
        $address = ShippingAddress::where("user_id",auth()->user()->id)->where("status",1)->orderBy("is_primary","desc");
        $address = $address->paginate($limit);
        return $this->sendResponse($address,"retrive shipping address success");
    }

    public function insert(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "name" => "required",
            "address" => "required",
            "province" => "required",
            "city" => "required",
            "district" => "required",
            "postal_code" => "required"
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $user_id = auth()->user()->id;
        ShippingAddress::where("user_id",$user_id)->update(["is_primary"=> "0"]);
        $input['user_id'] = $user_id;
        $input['is_primary'] = 1;
        $input['status'] = 1;
        $shipping = ShippingAddress::create($input);
        return $this->sendResponse($shipping,"success add new address");
    }

    public function delete($addressId)
    {
        $shipping = ShippingAddress::find($addressId);
        $shipping->status = 0;
        $shipping->update();
        return $this->sendResponse([],"address has been deleted");
    }

    public function update(Request $request,$addressId)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "name" => "required",
            "address" => "required",
            "province" => "required",
            "city" => "required",
            "district" => "required",
            "postal_code" => "required"
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $shipping = ShippingAddress::find($addressId);
        $shipping->update($input);
        return $this->sendResponse($shipping,"success update new address");
    }

    public function setPrimary($addressId)
    {
        $user_id = auth()->user()->id;
        ShippingAddress::where("user_id",$user_id)->update(["is_primary"=> "0"]);
        $shipping = ShippingAddress::find($addressId);
        $shipping->is_primary = 1;
        $shipping->update();
        return $this->sendResponse([],"success to set primary address");
    }
}