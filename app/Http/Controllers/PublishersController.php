<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublisherService;
use Illuminate\Support\Facades\Validator;

class PublishersController extends Controller
{
    public function get(){
        return PublisherService::get();
    }

    public function select(Request $request){
        $validator = Validator::make($request->all(),[
            'publishers'         => 'required|array'
        ]);
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Selecting publishers failed');
        }
        // return $request->publishers;
        return PublisherService::select($request->user()->id, sanitize_input($request->publishers));
    }
}
