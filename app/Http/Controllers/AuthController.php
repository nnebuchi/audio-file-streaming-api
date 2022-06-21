<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\AuthService;
use App\Rules\SingleWord;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;


class AuthController extends Controller
{
    public function signup(Request $request)
    {   
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8',
            'username'      => ['required', 'min:2', 'unique:users', new SingleWord ], 
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Registration failed');
            
           
        }
       return AuthService::createUser(sanitize_input($request->email), sanitize_input($request->password), sanitize_input($request->username));
    }

    public function sendOTP(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email|exists:users'
        ]);

        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'something went wrong');
        }

        $user = User::where('email', sanitize_input($request->email))->first();
    
        AuthService::sendOTP($user);

        return json_encode([
            'status'    => 'success',
            'email'     => $user->email,
            'message'   => 'Account verification code successfuly sent.',
        ]);
         
    }

    public function verifyOTP(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email',
            'otp'           => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Verification Failed'); 
        }
        return AuthService::verifyOTP(sanitize_input($request->otp), sanitize_input($request->email));
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Verification Failed'); 
        }
        return AuthService::login(sanitize_input($request->email), sanitize_input($request->password));
    }
}
