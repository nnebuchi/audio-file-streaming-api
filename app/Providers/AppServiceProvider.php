<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('single_word', 
            function ($attribute, $value, $parameters, $validator) {
                // if(is_string($value) && ! preg_match('/\s/u', $value)){
                //     return $parameters.' must be a single word';
                // }
                // return is_string($value) && ! preg_match('/\s/u', $value);
            }
        );
    }
}
