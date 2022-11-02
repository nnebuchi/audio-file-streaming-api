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

    public static function updateDetail($request){

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
        
        return Response::json(
            [
                "status"    =>"success",
                "message"   =>"Profile updated",
                "data"      =>$user
            ], 200
        );
    }

    public static function uploadProfilePhoto($request){
        $user = User::where('id', $request->user()->id)->first();
        if(!$user){
            return Response::json([
                'status'    =>'fail',
                'message'   =>'user not found',
                'error'   =>'user not found'
            ]);
        }
        return  FileService::upload($request, 'profile_photo', 'central_storage', 'users_profile_photos', $user->profile_photo);
    }

    public static function updateProfilePhoto($fileName, $userId){
        $user = User::where('id', $userId)->first();
        if(is_null($user)){
            return json_encode([
                'status'    =>'fail',
                'message'   =>'user not found',
                'error'   =>'user not found'
            ]);
        }
        $user->profile_photo = $fileName;
        $user->save();
        return Response::json([
            'status'    =>'success',
            'message'   =>'profile photo updated',
            'file'=>$user->profile_photo
        ]);
    }

}