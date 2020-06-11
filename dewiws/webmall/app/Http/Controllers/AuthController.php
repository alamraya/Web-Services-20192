<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client as Client;

class AuthController extends Controller
{

    public function login() {
        if (Auth::attempt([
            'email' => request('email'),
            'password' => request('password')])) {
            $Client = Client::where('password_client', 1)->first();
            return $this->getTokenAndRefreshToken($Client, request('email'), request('password'));
        }
        else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $password = $request->password;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $Client = Client::where('password_client', 1)->first();
        return $this->getTokenAndRefreshToken($Client, $user->email, $password);
    }

    public function getTokenAndRefreshToken(Client $Client, $email, $password) {
        $Client = Client::where('password_client', 1)->first();
        $response = Http::post('http://webmall.test:8080/oauth/token', [
                'grant_type' => 'password',
                'client_id' => $Client->id,
                'client_secret' => $Client->secret,
                'username' => $email,
                'password' => $password,
                'scope' => '*',
        ]);

        $result = json_decode((string) $response->getBody(), true);
        return response()->json($result, 200);
    }

    public function details() {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
