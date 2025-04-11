<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $userPassword = $request->only('email','password');
        try{
            if(! $token = JWTAuth::attempt($userPassword)):
                return response()->json(
                    [
                        'status' =>false,
                        'message' =>"Login gagal, user atau password salah!"
                    ],401

                );

            endif;

            $user = auth()->user();

            return response()->json([
                'status'  => true,
                'message'  => 'Login berhasil',
                'user'  =>  $user,
                'token'  => $token
            ]);
        }catch(JWTException $e){

        }
    }
}
