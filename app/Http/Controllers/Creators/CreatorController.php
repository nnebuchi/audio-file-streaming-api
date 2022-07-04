<?php

namespace App\Http\Controllers\Creators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CreatorUserService;
use Illuminate\Support\Facades\Validator;
use Services\FileService;

class CreatorController extends Controller
{
    function updateContactProfile(Request $request){
        return CreatorUserService::updateContactProfile($request);
    }

    public  function uploadProfilePhoto(Request $request){

        $validator = Validator::make($request->all(),[
            'profile_photo' => 'required|mimes:jpeg,jpg,png|max:2048'
            
        ]);

        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Registration failed');
        }

        FileService::upload($request, $directory);
    }
    
}
