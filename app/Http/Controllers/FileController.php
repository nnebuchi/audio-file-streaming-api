<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudioFile;

class FileController extends Controller
{
    public function getFilesByPublisher(Request $request){
        $files = AudioFile::where(['creator_id'=>sanitize_input($request->creator_id), 'slug'=>sanitize_input($request->slug)])->first();
    }
}
