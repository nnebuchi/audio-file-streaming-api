<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Services\FileService;

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

    public function updateDetail(Request $request){
        $validator = Validator::make($request->all(),[
            'display_name'  => 'required'
        ]);
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Selecting publishers failed');
        }
        return UserService::updateDetail($request);
    }

    public function uploadProfilePhoto(Request $request){
        $validator = Validator::make($request->all(),[
            'profile_photo' => 'required|mimes:jpeg,jpg,png|max:2048'
            
        ]);

        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Upload failed');
        }

        $uploadedFile =UserService::uploadProfilePhoto($request);
        return UserService::updateProfilePhoto($uploadedFile, $request->user()->id);
    }

}
