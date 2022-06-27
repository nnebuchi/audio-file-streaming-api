<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CreatorApiRequestCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if (!$request->hasHeader('authorization')) {
            return json_encode([
                 'status'=>'fail',
                 'message'=>'missing authorization header'
             ]);
        }
 
        if ($request->bearerToken() != env('WORDBANK_CREATOR_TOKEN')) {
              return json_encode([
                 'status'=>'fail',
                 'message'=>'invalid bearer token'
             ]);
        }
        return $next($request);
    }
}
