<?php

namespace App\Http\Controllers\Creators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CreatorUserService;
use Illuminate\Support\Facades\Validator;

class CreatorController extends Controller
{
    function updateContactProfile(Request $request){
        return CreatorUserService::updateContactProfile($request);
    }

    public  function uploadProfilePhoto(Request $request){

        $validator = Validator::make($request->all(),[
            'profile_photo' => 'required',
        ]);

        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Registration failed');
        }


    }
    
}
