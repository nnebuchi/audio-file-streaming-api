<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\TagService;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function all(){
        return Response::json([
            'status'    => 'success',
            'message'   => 'tags succesfuly fetched',
            'data'      => Tag::all()
        ], 200);
       
    }

    public function getPublisherTags(Request $request){
        $validator = Validator::make($request->all(),[
            'publisher_id'         => 'required'
        ]);
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Request failed');
        }
        return TagService::getPublisherTags($request);

        
    }
}
