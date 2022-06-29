<?php

namespace App\Services;

use App\Models\Creator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Events\CreatorCreated;
use App\Events\PasswordResetRequested;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordReset;

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

    public static function sendVerificationMail(Creator $user){
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
        $user = Creator::where(['email'=>$email, 'verification_code'=>$code])->first();

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
        // return Creator::all();
        // the DB class was used instead of User Model because we needed to access the pasword property which is hidden on the User Model
        $user = DB::table('creators')->where('email',$email)->first();
        
        if($user && Hash::check($password, $user->password)){
           return self::authenticate(($user->email));
        }

        return json_encode([
            'status'    => 'fail',
            'message'   => 'Login failed',
            'error'     => 'incorrect login details'
        ]); // Status code here
    }

    

    private static function authenticate(string $email){
        $user = Creator::where('email', $email)->first();
        
        $token = $user->createToken('auth_token')->plainTextToken;
        return json_encode([
            'status'        => 'success',
            'message'       => 'successful',
            'token'         =>  $token,
            'is_verified'   => true 
        ]); // Status code here
    }

    public static function sendPasswordResetLink(string $email){

        $user = Creator::where('email', $email)->first();
        if(!$user){
            return Response::json([
                'status'    => 'fail',
                'message'   => 'Invalid user',
                'error'     =>  'Invlaid reset token and email supplied'
            ], 200);
        }
        PasswordReset::where('email', $email)->delete();
        $passwordReset = new PasswordReset;
        $passwordReset->email = $email;
        $passwordReset->token = Str::random(24);
        $passwordReset->save();

        PasswordResetRequested::dispatch($passwordReset);

        return Response::json([
            'status'=>'success',
            'message'=>'Password reset link sent to your email address',
        ], 200);
    }

    public static function checkPasswordResetToken(string $email, string $token){
        $passwordReset = PasswordReset::where(['email'=>$email, 'token'=>$token])->first();
        if(!$passwordReset){
            return Response::json([
                'status'    => 'fail',
                'message'   => 'Invalid Link',
                'error'     => 'invalid reset link'
            ], 200);
        }
         return Response::json([
            'status'    => 'success',
            'message'   => 'Reset Instance found',
            'data'     =>  $passwordReset
        ], 200);
    }

    public static function resetPassword(string $email,  string $password, string $token){
        $passwordReset = PasswordReset::where(['email'=>$email, 'token'=>$token]);
        if(!$passwordReset){
            return Response::json([
                'status'    => 'fail',
                'message'   => 'Invalid reset payload',
                'error'     =>  'Invlaid reset token and email supplied'
            ], 200);
        }

        $user = Creator::where('email', $email)->first();
        if(!$user){
            return Response::json([
                'status'    => 'fail',
                'message'   => 'Invalid user',
                'error'     =>  'Invlaid reset token and email supplied'
            ], 200);
        }
        $user->password = Hash::make($password);
        $user->save();
        return Response::json([
            'status'    => 'success',
            'message'   => 'password successfully changed'
        ], 200);
    }

    public static function uploadProfilePhoto($request){
        
    }
}