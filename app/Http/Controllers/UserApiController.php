<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;

class UserApiController extends Controller
{
    function getDetail(Request $request){
        return UserService::getDetail($request);
    }
    function fetchUsers(Request $request){
        $users = User::all();
        return Response::json(
            [
                'status'=>'success',
                'users'=>$users
            ], 200
        );
    }

    function updateUser(Request $request){
        $user = User::where('id', sanitize_input($request->id))->first();
        $user->email = sanitize_input(($request->email));
        $user->username = sanitize_input(($request->name));
        $user->save();
        return json_encode([
            'status'=>'success',
            'message'=>'user updated',
            'users' =>User::all()
        ]);
    }

}
