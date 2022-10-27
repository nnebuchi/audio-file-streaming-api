<?php
namespace App\Services;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Models\User;

class UserService
{
    public static function getDetail($request){
        return Response::json([
            'status'=>'success',
            'message'=>'user detail fetched',
            'data'=>$request->user()
        ], 200);
    }

    public static function updateContactProfile($request){

        $user = User::where('id', $request->user()->id)->first();
        if(!$user){
            return Response::json(
                [
                    "status"    =>"fail",
                    "message"   =>"unauthorised access",
                    "error"     =>"you do not have the permission to uodate this content"     
                ], 401
            );
        }
        
            $user->username = sanitize_input($request->display_name);
        
        $user->save();

        return json_encode(
            [
                "status"    =>"success",
                "message"   =>"Profile updated"   
            ]
        );
    }

}