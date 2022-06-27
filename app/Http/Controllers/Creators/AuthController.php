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
}
