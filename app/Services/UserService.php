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

}