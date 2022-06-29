<?php

namespace App\Http\Controllers\Creators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Creator;
use App\Services\CreatorAuthService;

class AuthController extends Controller
{
    public function signup(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email|unique:creators',
            'password'      => 'required|min:8',
            'user_type'     =>  'required'
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Registration failed');
        }
        return CreatorAuthService::createUser(sanitize_input($request->email), sanitize_input($request->password), sanitize_input($request->user_type));
    }

    public function verifyEmail(Request $request){
        return CreatorAuthservice::verifyEmail(sanitize_input($request->email), sanitize_input($request->code));
    }
    

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required',
            'password'      => 'required'
        ]);
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Registration failed');
        }

        return CreatorAuthService::login(sanitize_input($request->email), sanitize_input($request->password));
    }

    public function sendPasswordResetLink(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email'
        ]);

        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Request failed');
        }

        return CreatorAuthService::sendPasswordResetLink(sanitize_input($request->email));
    }

    public function checkPasswordResetToken(Request $request){
        return CreatorAuthService::checkPasswordResetToken(sanitize_input($request->email), sanitize_input($request->token));
    }

    public function resetPassword(Request $request){

        $validator = Validator::make($request->all(),[
            'email'         => 'required',
            'password'      => 'required',
            'token'         => 'required'
        ]);
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Registration failed');
        }
        return CreatorAuthService::resetPassword(sanitize_input($request->email), sanitize_input($request->password), sanitize_input($request->token));
    }
    // public function getUser(Request $request){
    //     $token = PersonalAccessToken::findToken($request->bearerToken());

    //     return $token->tokenable;
    // }
}
