<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    public function all(){
        return Response::json([
            'status'    => 'success',
            'message'   => 'tags succesfuly fetched',
            'data'      => Tag::all()
        ], 200);
       
    }
}
