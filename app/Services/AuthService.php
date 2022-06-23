<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Events\UserCreated;
use Illuminate\Support\Facades\DB;

class AuthService
{
    public static function createUser(string $email, string $password, string $username){
        $user               = new User;
        $user->email        = $email;
        $user->password     = Hash::make($password);
        $user->username     = $username;
        $user->otp          = generateOTP();
        $user->save();

        self::sendOTP($user);
        
        return json_encode([
            'status'    => 'success',
            'email'     => $user->email,
            'user'      =>  $user,
            'message'   => 'registration successful. Check your email for your account verification code',
        ], 200);
    }

    public static function sendOTP($user){
        UserCreated::dispatch($user);
        return;
    }

    public static function verifyOTP($otp, $email){
        $user = User::where(['email'=>$email, 'otp'=>$otp])->first();
        if(is_null($user)){
            return json_encode([
                'status'    => 'fail',
                'message'   => 'incorrect code',
                'error'     => 'incorrect code'
            ], 200);
        }
        $user->otp = null;
        $user->email_verified_at = date('Y-m-d, h:i:s', time());
        $user->save();
        return self::authenticate(($user));
    }

    public static function login($email, $password){
        // the DB class was used instead of User Model because we needed to access the pasword property hich is hidden on the User Model
        $user = DB::table('users')->where('email',$email)->first();
        
        if($user && Hash::check($password, $user->password)){
           return self::authenticate(($user->email));
        }

        return json_encode([
            'status'    => 'fail',
            'message'   => 'Login failed',
            'error'     => 'incorrect login details'
        ]); // Status code here
    }

    private static function authenticate($email){
        $user = User::where('email', $email)->first();
        $token = $user->createToken('auth_token')->plainTextToken;
            return json_encode([
                'status'    => 'success',
                'message'   => 'verification successful',
                'token'     =>  $token
            ]); // Status code here
    }
    
}