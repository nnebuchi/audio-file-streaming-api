<?php

namespace App\Http\Controllers;

use App\Models\Paystack;
use Illuminate\Http\Request;

class PaystackController extends Controller
{
    public function events(Request $request){
        // return json_encode($request->all());
        $paystack = new Paystack;
        $paystack->dump = json_encode($request->all());
        

        if($request->reference){
            $paystack->reference = $request->reference;

        }
        $paystack->save();
        return 'done';
    }
}
