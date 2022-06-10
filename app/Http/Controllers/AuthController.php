<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use App\Services\AuthService;


class AuthController extends Controller
{
    public function register(Request $request): string
    {
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8',
            'username'      => 'required|min:2',
        ]);


        if ($validator->fails()) {
           
            return Response::json([
                'status'=>'fail',
                'message'=>'Registration Failed',
                'errors'=>$validator->errors()
            ], 409 ); // Status code here
           
        }
       return AuthService::createUser(sanitize_input($request->email), sanitize_input($request->password), sanitize_input($request->username));
        // $user = User::where('email', $request->email)->first();
     
        // if (! $user || ! Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }
     
        // return $user->createToken($request->device_name)->plainTextToken;
    }
}
