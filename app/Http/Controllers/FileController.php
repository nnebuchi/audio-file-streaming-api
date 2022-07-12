<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudioFile;
use app\Services\FileService;
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
}
