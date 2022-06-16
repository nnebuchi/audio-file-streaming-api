<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Response;


class AuthController extends Controller
{
    public function signup(Request $request): string
    {   
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8',
            'username'      => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return json_encode([
                'status'=>'fail',
                'message'=>'Registration Failed',
                'errors'=>$validator->errors()
            ], 406 ); // Status code here
           
        }
       return AuthService::createUser(sanitize_input($request->email), sanitize_input($request->password), sanitize_input($request->username));
    }

    public function sendOTP(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email'
        ]);


        if ($validator->fails()) {
           
            return json_encode([
                'status'=>'fail',
                'message'=>'Request Failed',
                'errors'=>$validator->errors()
            ], 422 ); // Status code here
           
        }
        $user = User::where('email', $request->email)->firstOrFail();
        AuthService::sendOTP($user);

        return json_encode([
            'status'    => 'success',
            'email'     => $user->email,
            'message'   => 'Account verification code successfuly sent.',
        ], 200);
         
    }

    public function verifyOTP(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email',
            'otp'           => 'required',
        ]);


        if ($validator->fails()) {
           
            return json_encode([
                'status'=>'fail',
                'message'=>'Request Failed',
                'errors'=>$validator->errors()
            ], 406 ); // Status code here
           
        }
        AuthService::verifyOTP(sanitize_input($request->otp), sanitize_input($request->email));
    }
}
