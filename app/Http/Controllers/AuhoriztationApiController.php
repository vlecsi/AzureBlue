<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuhoriztationApiController extends Controller
{
    public function register (Request $request) {
     
        $validator = Validator::make($request->all(), [
            "name" => 'bail|required|string|min:3|max:50',
            "email"=> 'bail|required',
            "password"=> 'bail|required',
          ]); 

            if ($validator->fails()) {
                $data =  ["data" => $validator->errors()->all()];
                return response()->json($data, 406 );
             }
    
            $user = User::create([
                       'name' => $request['name'],
                       'email' => $request['email'],
                       'password' => Hash::make($request['password']),
                   ]);
            
            $token = $user->createToken('auth_token')->plainTextToken;
            
            return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
            ]);
    }

    
    public function login(Request $request)
    {
          if (!Auth::attempt($request->only('email', 'password'))) {
                  return response()->json([
                    'message' => 'Utilizator sau parola neautorizata in domain !'
               ], 401);
           }
    
           $user = User::where('email', $request['email'])->firstOrFail();
           $token = $user->createToken('auth_token')->plainTextToken;
    
           return response()->json([
               'access_token' => $token,
               'token_type' => 'Bearer',
           ]);
    }


}
