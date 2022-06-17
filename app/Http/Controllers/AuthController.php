<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\AuthService;
use App\Rules\SingleWord;
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
            $errs = json_decode($validator->errors(), true);
            // return $validator->errors();
            foreach($errs as $key=>$err){
                return json_encode([
                    'status'    => 'fail',
                    'message'   => 'Registration Failed',
                    'error'     =>  $err[0]
                ]); // Status code here
                break;
            }
            
           
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
                // 'errors'=>$validator->errors()
            ]); // Status code here
           
        }
        $user = User::where('email', $request->email)->firstOrFail();
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
            'otp'           => 'required',
        ]);


        if ($validator->fails()) {
            $errs = json_decode($validator->errors(), true);
            // return $validator->errors();
            foreach($errs as $key=>$err){
                return json_encode([
                    'status'    => 'fail',
                    'message'   => 'Registration Failed',
                    'error'     =>  $err[0]
                ]); // Status code here
                break;
            }
            
           
        }
        AuthService::verifyOTP(sanitize_input($request->otp), sanitize_input($request->email));
    }
}
