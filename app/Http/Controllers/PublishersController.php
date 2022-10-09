<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublisherService;
use Illuminate\Support\Facades\Validator;

class PublishersController extends Controller
{
    public function get(Request $request){
        return PublisherService::get($request);
    }

    public function select(Request $request){
        $validator = Validator::make($request->all(),[
            'publishers'         => 'required|array'
        ]);
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Selecting publishers failed');
        }
        // return $request->publishers;
        return PublisherService::select(sanitize_input($request->publishers), $request->user()->id);
    }

    public function toggleFollow(Request $request){
        $validator = Validator::make($request->all(),[
            'publisher_id'         => 'required'
        ]);
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Selecting publishers failed');
        }
        return PublisherService::toggleFollow(sanitize_input($request->publisher_id), $request->user()->id);
    }

    public function getTrendingPublishers(){
        return PublisherService::getTrendingPublishers();
    }

    public function getPublisherData(Request $request){
        // $validator = Validator::make($request->all(),[
        //     'publisher_id'         => 'required',
        //     'limit'                => 'required|numeric'
        // ]);

        // if ($validator->fails()) {
        //     return returnValidationError($validator->errors(), 'Request failed');
        // }

        return PublisherService::getPublisherData($request);
    }
}
