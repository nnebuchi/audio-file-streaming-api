<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class UserApiController extends Controller
{
    function fetchUsers(Request $request){
        $users = User::all();
        return Response::json(
            [
                'status'=>'success',
                'users'=>$users
            ], 200
        );
    }

}
