<?php

namespace App\Services;
use App\Models\Creator;

class CreatorUserService{
    public static function updateContactProfile($request){
        $userData = getUser($request);
        $user = Creator::where('id', $userData->id)->first();
        if(!$user){
            return json_encode(
                [
                    "status"    =>"fail",
                    "message"   =>"invalid user",
                    "error"     =>"user not found"     
                ]
            );
        }
        foreach($request->all() as $param=>$value){
            $user->{$param} = $value;
        }
        $user->save();

        return json_encode(
            [
                "status"    =>"success",
                "message"   =>"Profile updated"   
            ]
        );
    }
}