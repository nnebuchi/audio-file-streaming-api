<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Events\UserCreated;
use Illuminate\Support\Facades\Response;

class AuthService
{
    public static function createUser($email, $password, $username){
        $user               = new User;
        $user->email        = $email;
        $user->password     = Hash::make($password);
        $user->username     = $username;
        $user->otp          = generateOTP();
        $user->save();

        self::sendOTP($user);
        
        return Response::json([
            'status'    => 'success',
            'email'     => $user->email,
            'message'   => 'registration successful. Check your email for your account verification code',
        ], 200);
    }

    public static function sendOTP($user){
        UserCreated::dispatch($user);
    }
}