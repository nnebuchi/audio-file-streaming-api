<?php

namespace App\Services;

use App\Models\Creator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Events\CreatorCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class CreatorAuthService
{
    public static function createUser(string $email, string $password, string $user_type){
        $user                       = new Creator;
        $user->email                = $email;
        $user->verification_code    = sha1(Str::random('7'));
        $user->verified_expiry_date = strtotime('+3 days');
        $user->password             =  Hash::make($password);
        $user->user_type            = $user_type;
        $user->save();

        self::sendVerificationMail($user);
        
        return json_encode([
            'status'    => 'success',
            'message'   => 'registration successful. Check your email for your account verification link',
        ]);
    }

    public static function sendVerificationMail($user){
        CreatorCreated::dispatch($user);
        return;
    }

    public static function verifyEmail(string $email, string $code){
        if($email=='' || $code==''){
            return json_encode([
                'status'    => 'fail',
                'message'   => 'Invalid Link',
                'error'     => 'Link not found'
            ]); // Status code here
        }
        $user = User::where(['email'=>$email, 'code'=>$code])->first();

        if(is_null($user)){
            return json_encode([
                'status'    => 'fail',
                'message'   => 'User not found',
                'error'     => 'Not user found'
            ], 200);
        }
        $user->verification_code = null;
        $user->email_verified_at = date('Y-m-d, h:i:s', time());
        $user->save();
        return self::authenticate($user->email);
    }

    public static function login($email, $password){
        // the DB class was used instead of User Model because we needed to access the pasword property hich is hidden on the User Model
        $user = DB::table('users')->where('email',$email)->first();
        if($user && (is_null($user->otp || $user->otp==''))){
            return json_encode([
                'status'        => 'success',
                'message'       => 'Login failed',
                'error'         => 'Email not verified',
                'is_verified'   => false  
            ]);
        }
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
            'status'        => 'success',
            'message'       => 'successful',
            'token'         =>  $token,
            'is_verified'   => true 
        ]); // Status code here
    }
    
}