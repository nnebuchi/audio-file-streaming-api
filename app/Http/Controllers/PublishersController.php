<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublisherService;

class PublishersController extends Controller
{
    public function get(){
        return PublisherService::get();
    }
    
}
