<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        try {
            $credentials = $request->only(['email', 'password']);
            $token = auth()->attempt($credentials);
            return [
                "token"=>$token,
                "user"=>auth()->user(),
                "success"=>true
            ];
        }catch (\Exception $exception){
            return ["error"=>$exception->getMessage(), "success"=>false];
        }
    }
}
