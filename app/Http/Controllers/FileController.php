<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudioFile;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{   
    
    public function getFiles(Request $request){
        $validator = Validator::make($request->all(),[
            'visible'         => 'required'
        ]);
        return FileService::getFiles($request);
    }

    public function getSingleFile(Request $request){
        return FileService::getSingleFile($request);
    }

    public function play(Request $request){
        $validator = Validator::make($request->all(),[
            'slug'         => 'required'
        ]);
        return FileService::play($request);
    }

    public function addToFavourites(Request $request){

        $validator = Validator::make($request->all(),[
            'slug'         => 'required'
        ]);

        return FileService::toggleFavourites(sanitize_input($request->slug), $request->user()->id);
    }
    
}
