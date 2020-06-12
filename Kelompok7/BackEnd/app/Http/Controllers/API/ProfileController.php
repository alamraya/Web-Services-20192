<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class ProfileController extends BaseController
{
    public function info(Request $request)
    {
        $infoUser = $request->user();
        return $this->sendResponse("Berhasil mengambil profile",$infoUser);
    }

    public function update(Request $request)
    {
        $input = $request->all();
    }
}