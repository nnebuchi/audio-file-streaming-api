<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Events\UserCreated;

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
            'message'   => 'registration successful. Check your email for your account verification code',
        ], 200);
    }

    public static function sendOTP($user){
        UserCreated::dispatch($user);
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
        return json_encode([
            'status'    => 'success',
            'message'   => 'verification successful'
        ]); // Status code here
    }
}